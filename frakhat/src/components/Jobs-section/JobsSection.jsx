import styles from './jobsSection.module.css'
import JobsAdvancedSearch from './JobsAdvancedSearch/JobsAdvancedSearch'
import JobsFound from './JobsFound/JobsFound'
import JobsAllPostion from './JobsAllPosition/JobsAllPostion'
import JobsFilter from './JobsFilter/JobsFilter'
import { useState } from 'react'

const JobsSection = () => {

  const [formData, setFormData] = useState({
    title: '',
    jobGroup: '',
    location: '',
    employment_type: '',
    minimum_salary: '',
    minimum_experience: '',
    sort: ''
  })

  return (
    <div className={styles.jobsSectionContainer}>
      <JobsAdvancedSearch formData={formData} setFormData={setFormData} />
      <JobsFound formData={formData} setFormData={setFormData}/>
      <div className={styles.jobsContent}>
        <JobsFilter formData={formData} setFormData={setFormData}/>
        <JobsAllPostion />
      </div>
    </div>
  )
}

export default JobsSection