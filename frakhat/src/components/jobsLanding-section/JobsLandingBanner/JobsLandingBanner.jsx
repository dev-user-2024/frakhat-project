import styles from './jobsLandingBanner.module.css'
import banner from '../../../assets/images/jobs-landing-banner.png'
import img from '../../../assets/images/jobs-landing-banner-img.png'

const JobsLandingBanner = () => {
    return (
        <div className={styles.bannerContainer}>
            <div className={styles.contentBanner}>
                <div className={styles.titleBanner}>
                    <h2>هم برای آموش، هم برای شغل </h2>
                    <div>
                        <h2>روی<span> فراخط</span></h2>
                        <img src={img} alt="" />
                        <h2> حساب کن</h2>
                    </div>
                </div>
                <div className={styles.subBanner}>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                </div>
                <div className={styles.buttonsBanner}>
                    <button>رزومه ساز</button>
                    <button>مشاهده شرکت های برتر</button>
                </div>
            </div>
            <div className={styles.imageBanner}>
                <img src={banner} alt="landing banner" />
            </div>
        </div>
    )
}

export default JobsLandingBanner