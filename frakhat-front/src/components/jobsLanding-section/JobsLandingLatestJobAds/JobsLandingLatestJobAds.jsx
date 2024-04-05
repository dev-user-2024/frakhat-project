import { useEffect, useState } from 'react'
import styles from './JobsLandingLatestJobAds.module.css'
import location from '../../../assets/icons/landingJobs-location.svg'
import arrowLeft from '../../../assets/icons/arrow-lef2.svg'
import { api } from '../../../services/index'
import { Link } from 'react-router-dom'

const JobsLandingLatestJobAds = () => {
    const [lastJobs, setLastJobs] = useState()

    useEffect(() => {
        (async () => {
            const { data: { data } } = await api().get('/latest-jobs')
            setLastJobs(data);
        })()
    }, [])


    return (
        <div className={styles.jobContainer}>
            <div className={styles.jobTitle}>
                <h2>جدیدترین آگهی‌های شغلی</h2>
            </div>
            <div className={styles.cards}>
                {
                    lastJobs?.slice(0, 6).map(job => (
                        <div key={job.id}>
                            <div className={styles.jobCard}>
                                <div>
                                    <h4>
                                        <Link to={`/jobs-details/${job.id}`}>
                                            {job.title}
                                        </Link>
                                    </h4>
                                </div>
                                <div>
                                    <span>{job.company}</span>
                                </div>
                                <div className={styles.jobLocation}>
                                    <img src={location} alt="" />
                                    <span>{job.location}</span>
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
                                        <pre>{job.job_description}</pre>
                                    </ul>
                                </div>
                                <div className={styles.jobButtons}>
                                    <span>{job.course}</span>
                                    <Link to={`/jobs-details/${job.id}`}>
                                        <button>
                                            <img src={arrowLeft} alt="" />
                                        </button>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    ))
                }
            </div>
        </div>
    )
}

export default JobsLandingLatestJobAds