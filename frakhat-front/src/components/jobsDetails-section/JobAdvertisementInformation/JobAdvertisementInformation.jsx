import styles from './JobAdvertisementInformation.module.css'
import resumeImage from '../../../assets/images/Jobs.resume.png'

const JobAdvertisementInformation = ({jobDetail}) => {
    return (
        <div className={styles.JobAdvertisementInformationContainer}>
            <div className={styles.AdvertisementInformationContent}>
                <h4>{jobDetail.title}</h4>
                <div>
                    <div>
                        <p>گروه شغلی: {jobDetail.job_group}</p>
                        <p>موقعیت مکانی: {jobDetail.location}</p>
                        <p>نوع همکاری: {jobDetail.employment_type}</p>
                    </div>
                    <div>
                        <p>سابقه کاری: {jobDetail.minimum_experience}</p>
                        <p>حداقل حقوق: {jobDetail.minimum_salary}</p>
                        <p>دوره‌های مرتبط:</p>
                    </div>
                </div>
            </div>
            <div>
                <img src={resumeImage} alt="" />
            </div>
        </div>
    )
}

export default JobAdvertisementInformation