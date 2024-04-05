
import { useState, useEffect } from 'react'
import CoursesSectionHeader from "./courses-section-header/CoursesSectionHeader"
import { api } from '../../services'
import * as Styled from "./styled";
import Response from '../../services/Response'
import ScaleLoader from "react-spinners/ScaleLoader"
import CoursesSectionSidebar from './courses-section-sidebar/CoursesSectionSidebar';
import CoursesSectionCourses from './courses-section-courses/CoursesSectionCourses';

const CoursesSections = () => {

  const [courses, setCourses] = useState(["در حال دریافت اطلاعات..."])
  const [isLoading, setIsLoading] = useState(true);
  

  useEffect(() => {
    const getSuggestToday = async () => {
      const { data: {data} } = await api().get('/course_list');
      setCourses(data);
      setIsLoading(false)
    }
    getSuggestToday()
  }, [])

  if (isLoading) {
    return (
      <div style={{ margin: "0 auto", height: "80vh", display: 'flex', alignItems: 'center' }} className='d-flex justify-content-center  '>
        <ScaleLoader size={20} color='#375288' />
      </div>
    )
  }

  return (
    <Styled.coursesSections>
      <CoursesSectionHeader courses={courses} />
      <div className='coursesContainer'>
        <CoursesSectionSidebar />
        <CoursesSectionCourses courses={courses}/>
      </div>
    </Styled.coursesSections>

  )
}

export default CoursesSections