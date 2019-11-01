<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $nds
 * @property int $city_id
 * @property string $text
 * @property int $logo_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property City $city
 * @property Files $logo
 */
class Client extends \yii\db\ActiveRecord
{

  /**
   * @var UploadedFile
   */
  public $clientLogo;

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
      [['name', 'city_id'], 'required'],
      [['nds', 'city_id', 'created_at', 'updated_at'], 'integer'],
      [['text'], 'string'],
      [['name', 'phone'], 'string', 'max' => 255],
      [['city_id'], 'exist', 'skipOnError' => true, 'targetClass' => City::className(), 'targetAttribute' => ['city_id' => 'id']],
      [['logo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Files::className(), 'targetAttribute' =>
        ['logo_id' => 'id']],
      [['clientLogo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
    ];
  }

  public function behaviors()
  {
    return [
      TimestampBehavior::class,
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
      'phone' => 'Phone',
      'nds' => 'Nds',
      'city_id' => 'City',
      'text' => 'Text',
      'logo_id' => 'Logo',
      'created_at' => 'Created At',
      'updated_at' => 'Updated At',
    ];
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getCity()
  {
    return $this->hasOne(City::className(), ['id' => 'city_id']);
  }

  /**
   * @return \yii\db\ActiveQuery
   */
  public function getLogo()
  {
    return $this->hasOne(Files::className(), ['id' => 'logo_id']);
  }

  /**
   * {@inheritdoc}
   * @return ClientQuery the active query used by this AR class.
   */
  public static function find()
  {
    return new ClientQuery(get_called_class());
  }

  public function uploadClientLogo()
  {
    if ($this->validate()) {
      $this->clientLogo->saveAs('uploads/img/' . $this->clientLogo->name);
      $model = new Files();
      $model->name = $this->clientLogo->name;
      $model->size = $this->clientLogo->size;
      if ($model->save(false)) {
        $model->link('clients', $this);
      }
      return true;
    } else {
      return false;
    }
  }
}
