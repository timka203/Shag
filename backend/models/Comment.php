<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $ID
 * @property int $user_id
 * @property string $text
 * @property string $theme_id
 * @property int|null $another_com_id
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'text', 'theme_id'], 'required'],
            [['user_id', 'another_com_id'], 'integer'],
            [['text'], 'string', 'max' => 500],
            [['theme_id'], 'string', 'max' => 255],
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
            'theme_id' => 'Theme ID',
            'another_com_id' => 'Another Com ID',
        ];
    }
}
