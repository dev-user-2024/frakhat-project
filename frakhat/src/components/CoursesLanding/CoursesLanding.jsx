import AboutCourses from './AboutCourses/AboutCourses'
import CoursesCategory from './CoursesCategory/CoursesCategory'
import CoursesLandingBanner from './CoursesLandingBanner/CoursesLandingBanner'
import CoursesProfessors from './CoursesProfessors/CoursesProfessors'
import JobSearch from './JobSearch/JobSearch'
import OurGoal from './OurGoal/OurGoal'
import PopularCourses from './PopularCourses/PopularCourses'
import Questions from './Questions/Questions'
import Mag from './Mag/Mag'
import SlidesPerView from './SlidesPerView/SlidesPerView'
import CommentsSlider from './CommentsSlider/CommentsSlider'
import { useEffect, useRef, useState } from 'react'
import { api } from '../../services'
import { ScaleLoader } from 'react-spinners'

const CoursesLanding = () => {

  const [courses, setCourses] = useState([])
  const [isLoading, setIsLoading] = useState(true);
  const coursesRef = useRef(null);
  

  useEffect(() => {
    const getSuggestToday = async () => {
      const { data: {data} } = await api().get('/course_list');
      setCourses(data);
      setIsLoading(false)
    }
    getSuggestToday()
  }, [])
  useEffect(() => {
    window.scrollTo(0, 0);
}, []);


  if (isLoading) {
    return (
      <div style={{ margin: "0 auto", height: "80vh", display: 'flex', alignItems: 'center' }} className='d-flex justify-content-center  '>
        <ScaleLoader size={30} color='#375288' />
      </div>
    )
  }


  return (
    <>
      <CoursesLandingBanner coursesRef={coursesRef} />
      <AboutCourses />
      <CoursesCategory />
      <PopularCourses courses={courses || []} coursesRef={coursesRef}/>
      <OurGoal />
      <CoursesProfessors />
      <JobSearch />
      <CommentsSlider />
      <Questions />
      <Mag />
      <SlidesPerView />
    </>
  )
}

export default CoursesLanding