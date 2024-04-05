import React, { useState, useEffect, useRef } from "react";
import "./CoursesSectionHeaderBanner.css";
import { useNavigate } from "react-router-dom";

const CoursesSectionHeaderBanner = ({ slides, courses }) => {
  const [index, setIndex] = useState(0);
  const [delay, setDelay] = useState(5000);
  const timeoutRef = useRef(null);
  const navigate = useNavigate()

  useEffect(() => {
    timeoutRef.current = setTimeout(
      () => setIndex((index + 1) % slides.length),
      delay
    );
    return () => clearTimeout(timeoutRef.current);
  }, [index, delay, slides.length]);

  const previousSlide = () => {
    setIndex(index === 0 ? slides.length - 1 : index - 1);
    resetTimeout();
  };

  const nextSlide = () => {
    setIndex(index === slides.length - 1 ? 0 : index + 1);
    resetTimeout();
  };

  const resetTimeout = () => {
    clearTimeout(timeoutRef.current);
    timeoutRef.current = setTimeout(
      () => setIndex((index + 1) % slides.length),
      delay
    );
  };

  const navigateToCourse = (id) => {
    navigate(`/courses/courseDetails/${id}`)
  }

  return (
    <div className="carousel">
      {/* <div className="arrow arrow-left" onClick={previousSlide} /> */}
      {courses.slice(-5).map((slide, i) => (
        <img
          key={i}
          onClick={() => navigateToCourse(slide.id)}
          src={`https://support.frakhat.ir/${slide.thumbnail_course}`}
          alt={slide.alt}
          className={`slide ${i === index ? "active" : ""} ${
            i !== index && "slide-hidden"
          }`}
        />
      ))}
      {/* <div className="arrow arrow-right" onClick={nextSlide} /> */}
      <div className="indicators">
        {slides.map((_, i) => (
          <button
            key={i}
            className={`indicator ${index === i ? "active" : "inactive"}`}
            onClick={() => {
              setIndex(i);
              resetTimeout();
            }}
          />
        ))}
      </div>
    </div>
  );
};

export default CoursesSectionHeaderBanner;