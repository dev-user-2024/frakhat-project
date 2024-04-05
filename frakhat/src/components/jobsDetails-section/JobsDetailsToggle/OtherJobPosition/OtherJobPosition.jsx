import styles from './OtherJobPosition.module.css'
import profile from '../../../../assets/images/jobs-profile.png'
import starProfile from '../../../../assets/icons/jobs-star.svg'
import sendProfile from '../../../../assets/icons/jobs-send.svg'
import location from '../../../../assets/icons/landingJobs-location.svg'

const OtherJobPosition = () => {
  return (
    <div className={styles.otherJobPositionContainer}>
      <div>
        <div className={styles.cardContent}>
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
              </div>
            </div>
          </div>
        </div>
        <div className={styles.profile}>
          <img src={profile} alt="" />
          <div className={styles.buttonsProfile}>
            <button>
              <img src={sendProfile} alt="" />
              ارسال رزومه
            </button>
            <button>
              <img src={starProfile} alt="" />
              نشان کردن
            </button>
          </div>
        </div>
      </div>
    </div>
  )
}

export default OtherJobPosition