<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;


/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $full_name
 * @property int $gender
 * @property string $date_of_birth
 * @property string|null $date_of_creation
 * @property int $created_by
 * @property string|null $update_date
 * @property int|null $updated_by
 * @property string|null $deletion_date
 * @property int|null $deleted_by
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'gender', 'date_of_birth', 'created_by'], 'required'],
            [['gender', 'created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['date_of_birth', 'date_of_creation', 'update_date', 'deletion_date'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
            [['date_of_birth'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'date_of_creation' => 'Date Of Creation',
            'created_by' => 'Created By',
            'update_date' => 'Update Date',
            'updated_by' => 'Updated By',
            'deletion_date' => 'Deletion Date',
            'deleted_by' => 'Deleted By',
        ];
    }
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                // This is a new record
                $this->created_by = Yii::$app->user->id;
                $this->date_of_creation = new Expression('NOW()');
            } 
            else {
                // This is an existing record being updated
                $this->updated_by = Yii::$app->user->id;
                $this->update_date = new Expression('NOW()');

            }
            return true;
        } 
        else {
            return false;
        }
    }

    public function beforeDelete()
{
    if (!parent::beforeDelete()) {
        return false;
    }

    $this->deletion_date = new \yii\db\Expression('NOW()');
    $this->deleted_by = Yii::$app->user->id;
    $this->save(false);  // false parameter skips validation

    return false; // Prevent the actual deletion
}
}
