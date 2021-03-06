<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
namespace common\modules\localization\modules\lengthclass\managers;

use usni\library\components\UiTableBuilder;
/**
 * LengthClassTableBuilder class file.
 * 
 * @package common\modules\localization\modules\lengthclass\managers
 */
class LengthClassTableBuilder extends UiTableBuilder
{
    /**
     * @inheritdoc
     */
    protected function getTableSchema()
    {
        return [
            'id' => $this->primaryKey(11)->notNull(),
            'unit' => $this->string(10)->notNull(),
            'value' => $this->decimal(10,2)->notNull(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    protected function getIndexes()
    {
        return [
                ['idx_unit', 'unit', true],
            ];
    }
    
    /**
     * @inheritdoc
     */
    protected static function isTranslatable()
    {
        return true;
    }
}
