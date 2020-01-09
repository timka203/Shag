<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "theme".
 *
 * @property int $ID
 * @property int $user_id
 * @property string $text
 * @property string $theme_name
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'theme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'text', 'theme_name'], 'required'],
            [['user_id'], 'integer'],
            [['text'], 'string', 'max' => 500],
            [['theme_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'user_id' => 'User ID',
            'text' => 'Text',
            'theme_name' => 'Theme Name',
        ];
    }
}
