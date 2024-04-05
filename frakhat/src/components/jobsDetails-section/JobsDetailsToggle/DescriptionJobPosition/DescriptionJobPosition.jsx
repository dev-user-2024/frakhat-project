import styles from './DescriptionJobPosition.module.css'
import location from '../../../../assets/icons/landingJobs-location.svg'
import arrowLeft from '../../../../assets/icons/arrow-lef2.svg'

const DescriptionJobPosition = ({jobDetail}) => {
  return (
    <div className={styles.descriptionJobPosition}>
      <div className={styles.jobContent}>
        <p>تسلط به دوربین های</p>
        <ul>
          <pre>
            {jobDetail.job_description}
          </pre>
        </ul>
      </div>
      <div className={styles.tags}>
        <div>
          <p>مهارت مورد نیاز:</p>
        </div>
        <div>
          <span>عکاسی</span>
          <span>فیلمبرداری</span>
          <span>Adobe Premiere</span>
          <span>Adobe Premiere</span>
          <span>After Effects</span>
        </div>
      </div>
      <div className={styles.tags}>
        <div>
          <p>جنسیت:</p>
        </div>
        <div>
          <span>{jobDetail.gender}</span>
        </div>
      </div>
      <div className={styles.tags}>
        <div>
          <p>وظیفه نظام جدید:</p>
        </div>
        <div>
          <span>{jobDetail.military_status}</span>
          
        </div>
      </div>
      <div className={styles.jobContainer}>
        <div className={styles.jobTitle}>
          <h2>جدیدترین آگهی‌های شغلی</h2>
        </div>
        <div className={styles.cards}>
          <div>
            <div className={styles.jobCard}>
              <div>
                <h4>عکاس تبلیغاتی</h4>
              </div>
              <div>
                <span>صنایع لبنی مزرعه سبز</span>
              </div>
              <div className={styles.jobLocation}>
                <img src={location} alt="" />
                <span>تهران</span>
              </div>
              <div className={styles.jobTag}>
                <div>
                  حضوری
                </div>
                <div>
                  تمام وقت
                </div>
                <div>
                  حقوق از 18 میلیون تومان
                </div>
              </div>
              <div className={styles.jobContent}>
                <ul>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</li>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</li>
                </ul>
              </div>
              <div className={styles.jobButtons}>
                <span>دوره عکاسی فراخط</span>
                <button>
                  <img src={arrowLeft} alt="" />
                </button>
              </div>
            </div>
          </div>
          <div>
            <div className={styles.jobCard}>
              <div>
                <h4>عکاس تبلیغاتی</h4>
              </div>
              <div>
                <span>صنایع لبنی مزرعه سبز</span>
              </div>
              <div className={styles.jobLocation}>
                <img src={location} alt="" />
                <span>تهران</span>
              </div>
              <div className={styles.jobTag}>
                <div>
                  حضوری
                </div>
                <div>
                  تمام وقت
                </div>
                <div>
                  حقوق از 18 میلیون تومان
                </div>
              </div>
              <div className={styles.jobContent}>
                <ul>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</li>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</li>
                </ul>
              </div>
              <div className={styles.jobButtons}>
                <span>دوره عکاسی فراخط</span>
                <button>
                  <img src={arrowLeft} alt="" />
                </button>
              </div>
            </div>
          </div>
          <div>
            <div className={styles.jobCard}>
              <div>
                <h4>عکاس تبلیغاتی</h4>
              </div>
              <div>
                <span>صنایع لبنی مزرعه سبز</span>
              </div>
              <div className={styles.jobLocation}>
                <img src={location} alt="" />
                <span>تهران</span>
              </div>
              <div className={styles.jobTag}>
                <div>
                  حضوری
                </div>
                <div>
                  تمام وقت
                </div>
                <div>
                  حقوق از 18 میلیون تومان
                </div>
              </div>
              <div className={styles.jobContent}>
                <ul>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.</li>
                  <li>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم.</li>
                </ul>
              </div>
              <div className={styles.jobButtons}>
                <span>دوره عکاسی فراخط</span>
                <button>
                  <img src={arrowLeft} alt="" />
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}

export default DescriptionJobPosition