
import { useState,useEffect } from "react";
import { useParams } from "react-router-dom";
import { api } from "../../services";
import NewsDetailsMain from "./newsDetails-main/NewsDetailsMain.jsx"
import NewsDetailsSideBar from "./newsDetails-sideBar/NewsDetailsSideBar";
import styles from "./newsDetailsSections.module.css";


import React from 'react'

const NewsDetailsSections = () => {

  const [news, setNews] = useState({})
  const [category, setCategory] = useState('')
  const { title_news } = useParams();

  useEffect(() => {
    (async() => {     
      const { data: { data } } = await api().get(`/post/${title_news}`);
      setNews(data.data);
      setCategory(data.data.categories[0].title);
    })()
  }, [title_news])

  useEffect(() => {
    window.scrollTo(0, 0);
  }, [title_news]);



  return (
    <div className={styles.news_details_sections}>
      <div className={styles.news_details_section1}>
        <NewsDetailsMain news={news} category={category} />
        <NewsDetailsSideBar />
      </div>
      {/* <NewsDetailsSuggestedContents/> */}
      {/* <NewsDetailsComment news={news} /> */}
    </div>
  ) 
};
 
export default NewsDetailsSections; 