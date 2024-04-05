import React, { useEffect, useState } from 'react'
import JobsLandingBanner from './JobsLandingBanner/JobsLandingBanner'
import styles from './jobsLandingSection.module.css'
import JobsLandingLatestJobAds from './JobsLandingLatestJobAds/JobsLandingLatestJobAds'
import JobsAdvancedSearch from '../Jobs-section/JobsAdvancedSearch/JobsAdvancedSearch'

const JobsLandingSection1 = () => {
  const [formData, setFormData] = useState({
    title: '',
    jobGroup: '',
    location: '',
    employment_type: '',
    minimum_salary: '',
    minimum_experience: '',
    sort: ''
  })

  useEffect(() => {
    window.scrollTo(0, 0);
}, []);

  return (
    <div className={styles.dimension}>
      <JobsLandingBanner />
      <JobsAdvancedSearch formData={formData} setFormData={setFormData}/>
      <JobsLandingLatestJobAds />
    </div>
  )
}

export default JobsLandingSection1