<? $course = \common\models\Course::find()->where(['id'=>1])->one()?><a href="/course/view?id=">
    <div class="card-shadow prof-card-info">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <div class="d-flex align-items-baseline">
                    <div class="banner-rating banner-rating-one bg-green"></div>
                    <div class="mx-1 banner-rating banner-rating-two"></div>
                    <div class="mr-2 banner-rating banner-rating-three"></div>
                    <span>Средний</span>
                </div>
                <h4>qwerty</h4>
            </div>
            <div class="col-3 text-center course-preview" style="background-image: url('<?=$course->preview;?>')"></div>
        </div>
        <p class="d-flex align-items-center justify-content-between mt-4">
            <span>1/13 тестов</span>
            <span>28/169 уроков</span>
            <span class="txt-green"><img  class="mr-1" src="/img/course/success-icon.svg" alt="">100%</span>
        </p>
        <div class="progress mt-2">
            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="progress mt-2">
            <a href="">тык</a>
        </div>
    </div>
</a>


<div class="view-card-border mt-4 p-3">
    <p class="buy-card__title ml-3 fs-22">Программа курса</p>
    <div class="card-border mb-3 toggle">
        <div class="d-flex justify-content-between fs-18">
            <p class="mb-0 fw-6">Универсальные знания дизайнера</p>
            <p>3:00</p>
        </div>
        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>
    </div>
    <div class="card-border mb-3 toggle">
        <div class="d-flex justify-content-between fs-18">
            <p class="mb-0 fw-6">Универсальные знания дизайнера</p>
            <p>3:00</p>
        </div>
        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>
    </div>
    <div class="card-border mb-3 toggle">
        <div class="d-flex justify-content-between fs-18">
            <p class="mb-0 fw-6">Универсальные знания дизайнера</p>
            <p>3:00</p>
        </div>
        <a href="" class="txt-green none toggle-text fs-16 fw-6">Предпросмотр</a>
    </div>
</div>