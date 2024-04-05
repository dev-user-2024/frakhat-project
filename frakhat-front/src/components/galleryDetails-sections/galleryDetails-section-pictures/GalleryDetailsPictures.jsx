import styles from "./GalleryDetailsPictures.module.css"

const GalleryDetailsPictures = ({ gallery }) => {


    return (
        <div className={`${styles.GalleryDetailsPictures} d-grid`}>
            {
                gallery.pictures_gallery?.map((item, index) => (
                    <img key={index} src={`https://app.frakhat.ir/image/gallery/${item}`} alt="" />
            ))
            }
        </div>
    )
}

export default GalleryDetailsPictures