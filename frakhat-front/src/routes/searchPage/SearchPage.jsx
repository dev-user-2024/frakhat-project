  
import { useState, useEffect } from "react";
import { useParams } from "react-router-dom";
import axios from "axios";
import SquareNewsCard from "../../components/UI/square-news-card/square-news-card.component"


import styles from "./SearchPage.module.css"

const SearchPage = () => {

    const { search_text } = useParams();

    const [data, setData] = useState([])


    useEffect(() => {

        const getSearchData = async () => {
            await axios.get("https://app.frakhat.ir/api/homepage/news_search", { params: { s: search_text } }).then(response => setData(response.data.data))
        }
        getSearchData()

    }, [search_text])


    
  

    return (
        <>
            <div className={`${styles.searchPage_container} mt-4`}>
                {
                    data.map((item, index) => {
                        return (
                            <span key={index}>
                                <SquareNewsCard classType="card_container-big" key={index} image={`https://app.frakhat.ir/image/news/original/${item.thumbnail_news}`} title={item.title_news} summary={item.excerpt_news} date={item.date} time={item.time} />
                            </span>
                        )
                    })
                } 
            </div>
        </>
    )
}

export default SearchPage