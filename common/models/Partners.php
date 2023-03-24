<?php

namespace common\models;

use common\traits\AttributesToInfoTrait;
use Yii;
use yii\web\UploadedFile;
use common\components\ActiveRecord;

/**
 * This is the model class for table "partners".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $alias
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property string|null $info
 */
class Partners extends ActiveRecord
{
    use AttributesToInfoTrait;

    /**
     * {@inheritdoc}
     */
    const STATUS_DRAFT = 0;
    const STATUS_PUBLISH = 1;

    /**
     * {@inheritdoc}
     */
    const STATUS_PARTNER = 0;
    const STATUS_SPONSOR = 1;

    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * {@inheritdoc}
     */

    public function attributesToInfo()
    {
        return [
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title','status','image','type'], 'required'],
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['title', 'image', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'alias' =>  'URL',
            'image' =>  'Изображение',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата обновления',
            'status' => 'Статус',
            'type' => 'Тип',
            'info' => 'Описание',
        ];
    }
    private function saveFile(UploadedFile $file){
    $link = ($this->image) ? : null;
    $this->file = $file;
    if ($this->validate(['file'])) {
        $rand = uniqid(rand(), true);
        $dir = Yii::getAlias('@frontend/web/docs/partners/');
        $dir2 = Yii::getAlias('docs/partners/');
        $fileName = $rand . '.' . $this->file->extension;
        $this->file->saveAs($dir . $fileName);
        $this->file = $fileName; // без этого ошибка
        $link = '/'.$dir2 . $fileName;
    }

    $this->image = $link;
    $this->file = null;
}

    public function save($runValidation = true, $attributeNames = null)
    {
        $file = UploadedFile::getInstance($this, "file");
        if ($file && $file->tempName) {
            $this->saveFile($file);
        }
        if ($this->isNewRecord){
            $this->created_at = time();
        }
        $this->updated_at = time();
        return parent::save($runValidation, $attributeNames); // TODO: Change the autogenerated stub
    }
    /**
     * @return array
     */
    public static function getStatusList(){
        return [
            self::STATUS_DRAFT => Yii::t('main', 'Черновик'),
            self::STATUS_PUBLISH => Yii::t('main', 'Опубликован'),
        ];
    }
    public static function getTypeList(){
        return [
            self::STATUS_PARTNER => Yii::t('main', 'Партнер'),
            self::STATUS_SPONSOR => Yii::t('main', 'Спонсор'),
        ];
    }
}
