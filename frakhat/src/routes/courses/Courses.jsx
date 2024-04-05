
import CoursesSections from "../../components/courses-sections/CoursesSections"
import React, { useEffect } from 'react'

const Courses = () => {
    useEffect(() => {
        window.scrollTo(0, 0);
    }, []);

    return (
        <>
            <CoursesSections />
        </>

    )
}

export default Courses