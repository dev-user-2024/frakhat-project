import React, { useEffect } from 'react'
import JobsSection from '../../components/Jobs-section/JobsSection'

const Jobs = () => {
  useEffect(() => {
    window.scrollTo(0, 0);
  }, []);

  return <JobsSection />
}

export default Jobs