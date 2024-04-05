import { useState, useEffect } from 'react'
import { api } from "../../services";
import { useParams } from "react-router-dom";
import { useNavigate } from 'react-router-dom'
import CourseDetailsSectionHeader from "./courseDetails-section-header/CourseDetailsSectionHeader"
import CourseDetailsHeadlines from "./courseDetails-section-headlines/CourseDetailsHeadlines"
import styles from "./CourseDetailsSections.module.css"
import { ScaleLoader } from 'react-spinners';
import CourseDetailsSectionAbout from './courseDetails-section-about/CourseDetailsSectionAbout';
import CourseDetailsSampleTraining from './courseDetails-Sample-training/CourseDetailsSampleTraining';
import CoursDetailsJobSearch from './cours-details-job-search/coursDetailsJobSearch';
import CourseDetailsComments from './courseDetails-comments/CourseDetailsComments';
import CourseDetailsQuestion from './courseDetails-question/CourseDetailsQuestion.jsx';
import CourseDetailsInfo from './courseDetails-Info/CourseDetailsInfo';
import CourseDetailsCart from './courseDetails-cart/CourseDetailsCart';

const CourseDetailsSections = () => {
  const [course, setCourse] = useState(["درحال دریافت اطلاعات"])
  const { slug } = useParams();
  const navigate = useNavigate();
  const [isLoading, setIsLoading] = useState(true);

  useEffect(() => {
    setCourse([])
    const getData = async () => {
      try {
        const { data } = await api().get(`/single_course/${slug}`);
        console.log(data)
        setCourse(data.data);
        setIsLoading(false)
      } catch (error) {
        console.log(error)
      }
    }
    slug !== "undefined" ? getData() : navigate("/courses")
  }, [navigate, slug])

  useEffect(() => {
    window.scrollTo(0, 0);
  }, [slug]);

  if (isLoading) {
    return (
      <div style={{margin: "100px"}} className='d-flex justify-content-center  '>
        <ScaleLoader size={20} color='#375288'/>
      </div>
    )
  }

  return (
    <div className={styles.CourseDetailsSections}>
      <CourseDetailsSectionHeader course={course}/>
      <CourseDetailsSectionAbout course={course}/>
      <CourseDetailsHeadlines course={course}/>
      <CourseDetailsSampleTraining course={course}/>
      <CoursDetailsJobSearch course={course}/>
      <CourseDetailsComments course={course}/>
      <CourseDetailsQuestion course={course}/>
      <CourseDetailsInfo course={course}/>
      <CourseDetailsCart course={course}/>
    </div>
  )
}

export default CourseDetailsSections