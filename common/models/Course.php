<?php

namespace common\models;

use common\components\ActiveRecord;
use common\traits\AttributesToInfoTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property int $is_deleted
 * @property string|null $title
 * @property string|null $description
 * @property string|null $info
 * @property string|null $preview
 * @property string|null $requirements
 * @property string|null $what_learn
 * @property int|null $status
 * @property int|null $type
 * @property float $price
 * @property Module[]|null $modules
 */
class Course extends ActiveRecord
{
    const TYPE_FREE = 0;
    const TYPE_PAID = 1;

    const STATUS_DISABLED = 0;
    const STATUS_ACTIVE = 1;

    const FIRST_LEVEL = 1;
    const SECOND_LEVEL = 2;
    const THIRD_LEVEL = 3;

    public $previewFile = null;
    use AttributesToInfoTrait;
    /**
     * {@inheritdoc}
     */
    public function attributesToInfo()
    {
        return [
            'price',
            'preview',
            'requirements',
            'what_learn',
            'level',
            'created_at',
            'updated_at'
        ];
    }

    public static function tableName()
    {
        return 'course';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['title', 'type'], 'required'],
            [['price','info','sort','preview', 'requirements', 'what_learn'], 'safe'],
            [['description'], 'string'],
            ['previewFile', 'file','extensions' => ['png', 'jpg', 'gif', 'PNG', 'JPG', 'GIF', 'JPEG', 'jpeg','svg']],
            [['status', 'type', 'sort', 'level'], 'integer'],
            [['status'], 'default', 'value' => function(){
                return self::STATUS_DISABLED;
            }],
            [['level'], 'default', 'value' => function(){
                return self::FIRST_LEVEL;
            }],
            [['price'], 'double'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @param UploadedFile $file
     */
    private function saveFile(UploadedFile $file){
        $link = ($this->preview) ? : null;
        $this->previewFile = $file;
        if ($this->validate(['previewFile'])) {
            $rand = uniqid(rand(), true);
            $dir = Yii::getAlias('@frontend/web/docs/course/');
            $dir2 = Yii::getAlias('docs/course/');
            $fileName = $rand . '.' . $this->previewFile->extension;
            $this->previewFile->saveAs($dir . $fileName);
            $this->previewFile = $fileName; // без этого ошибка
            $link = '/'.$dir2 . $fileName;
        }

        $this->preview = $link;
    }

    public function save($runValidation = true, $attributeNames = null)
    {
        $file = UploadedFile::getInstance($this, "previewFile");
        if ($file && $file->tempName) {
            $this->saveFile($file);
        }
        return parent::save($runValidation, $attributeNames);
    }

    /**
     * @return array
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_DISABLED => Yii::t('app', 'Черновик'),
            self::STATUS_ACTIVE => Yii::t('app', 'Активный'),
        ];
    }

    /**
     * @return array
     */
    public static function getTypes()
    {
        return [
            self::TYPE_FREE => Yii::t('app', 'Бесплатно'),
            self::TYPE_PAID => Yii::t('app', 'Платный'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModules(){
        return $this->hasMany(Module::className(), ['course_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getStatusList(){
        return [
            self::STATUS_DISABLED => Yii::t('main', 'Черновик'),
            self::STATUS_ACTIVE => Yii::t('main', 'Опубликован'),
        ];
    }

    /**
     * @return array
    */
    public static function getLevelList()
    {
        return [
            self::FIRST_LEVEL => Yii::t('main', 'Первый'),
            self::SECOND_LEVEL => Yii::t('main', 'Второй'),
            self::THIRD_LEVEL => Yii::t('main', 'Третий'),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название курса'),
            'description' => Yii::t('app', 'Описание курса'),
            'info' => Yii::t('app', 'Info'),
            'status' => Yii::t('app', 'Статус'),
            'type' => Yii::t('app', 'Тип'),
            'price' => Yii::t('app', 'Цена'),
            'previewFile' => Yii::t('app', 'Превью картинка курса'),
            'requirements' => Yii::t('app', 'Требование'),
            'what_learn' => Yii::t('app', 'Чему вы научитесь'),
            'level' => Yii::t('app', 'Уровень')
        ];
    }
}
