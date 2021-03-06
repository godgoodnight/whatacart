<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace taxes\components;

use usni\UsniAdaptor;
use usni\library\extensions\bootstrap\widgets\UiActionColumn;
use usni\library\components\UiHtml;
use taxes\utils\TaxUtil;
use usni\fontawesome\FA;
/**
 * ProductTaxClassActionColumn class file.
 * 
 * @package taxes\components
 */
class ProductTaxClassActionColumn extends UiActionColumn
{
    /**
     * @inheritdoc
     */
    protected function renderDeleteActionLink($url, $model, $key)
    {
        $isAllowed = TaxUtil::checkIfProductTaxClassAllowedToDelete($model);
        if($isAllowed)
        {
            if($this->checkAccess($model, 'delete'))
            {
                $shortName = strtolower(UsniAdaptor::getObjectClassName($this->grid->owner->model));
                $icon = FA::icon('trash-o');
                return UiHtml::a($icon, $url, [
                            'title' => \Yii::t('yii', 'Delete'),
                            'id'    => 'delete-' . $shortName . '-' . $model['id'],
                            'data-confirm' => \Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ]);
            }
            return null;
        }
        return null;
    }
}