
import { useState, useEffect } from 'react'
import { api } from '../../services'
import { useParams } from "react-router-dom";
import GalleryDetailsInfo from "./galleryDetails-section-info/GalleryDetailsInfo"
import GalleryDetailsPictures from "./galleryDetails-section-pictures/GalleryDetailsPictures"
import styles from "./GalleryDetailsSections.module.css"

const GalleryDetailsSections = () => {

  const [gallery, setGallery] = useState([])
  const [category, setCategory] = useState('')
  const { id } = useParams();

  useEffect(() => {
    (async () => {
      const { data: { data } } = await api().get(`/post/${id}`);
      setGallery(data.data);
      setCategory(data.data.categories[0].title);
    })()
  }, [id])


  return (
    <div className={styles.galleryDetailsSections}>
      {/* <GalleryDetailsNavigation /> */}
      <GalleryDetailsInfo gallery={gallery} category={category}/>
      <GalleryDetailsPictures gallery={gallery} />

    </div>
  )
}

export default GalleryDetailsSections