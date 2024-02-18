<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;
/**
 * This is the model class for table "club".
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string|null $date_of_creation
 * @property int $created_by
 * @property string|null $update_date
 * @property int|null $updated_by
 * @property string|null $deletion_date
 * @property int|null $deleted_by
 */
class Club extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'club';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'created_by'], 'required'],
            [['address'], 'string'],
            [['date_of_creation', 'update_date', 'deletion_date'], 'safe'],
            [['created_by', 'updated_by', 'deleted_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
            // [['date_of_creation','update_date', 'deletion_date'], 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
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

            } else {
                // This is an existing record being updated
                $this->updated_by = Yii::$app->user->id;
                $this->update_date = new Expression('NOW()');

            }
            return true;
        } else {
            return false;
        }
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $this->deletion_date = new Expression('NOW()');
            $this->deleted_by = Yii::$app->user->id;
            $this->save(false); // Save the record without validation
            return false; // Prevent the actual deletion
        } else {
            return false;
        }
    }
    
}
