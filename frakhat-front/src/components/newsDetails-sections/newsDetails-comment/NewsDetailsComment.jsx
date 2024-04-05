import { useState, useRef } from 'react';
import TitleLine from "../../title-line/title-line.component"
import Button from "../../buttons/button.component"
import axios from 'axios';
import { useAuth } from '../../../hooks/useAuth'


import { ReactComponent as ArrowDownIcon } from "../../../assets/icons/arrow-down.svg"

import styles from "./NewsDetailsComment.module.css"

const commentList = [
    {
        "id": 1,
        "name": "محمد علی‌پور",
        "date": "اردیبهشت 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنت. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.ولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",

    },
    {
        "id": 2,
        "name": "محمد طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",

    },
    {
        id: 3,
        "name": "رضا طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",
    },
    {
        id: 4,
        "name": "محمد طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",
    },
    {
        "id": 5,
        "name": "محمد طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",

    },
    {
        id: 6,
        "name": "رضا طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",
    },
    {
        id: 7,
        "name": "محمد طاهری",
        "date": "فروردین 1401",
        "content": "لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.",
    }
]

const Comment = ({ name, date, content }) => {
    return (
        <div className={styles.comment} >

            <div className={styles.commentContent}>
                <p>{content}</p>
            </div>

            <div className={styles.commentInfo} >

                <h6>{name}</h6>
                <h6>{date}</h6>
            </div>

        </div>
    )
}
const NewsDetailsComment = ({ news }) => {


    // const auth = useAuth();
    const [name, setName] = useState("")
    const [email, setEmail] = useState("");
    const [comment, setComment] = useState("");
    // const [commentList2, setCommentList2] = useState("");

    const [numOfComment, setNumOfComment] = useState(1)

    // const auth = useAuth()

    // console.log(auth.hasAuth)


    const commentMsg = useRef("")

    // useEffect(() => {
    //     const getData = async () => {
    //         const { data } = await api(auth.token).get(NewsCommentListURL);
    //         setCommentList2(data.data);
    //     }
    //     getData()
    // }, []);

    
    // useEffect(() => {

    //     const getData = async () => {

    //         await axios.get(`https://app.frakhat.ir/api/homepage/comment_news_list/${news.id}`).then(({ data }) => {
    //             setCommentList2(data.data);
    //         });
    //     }

    //     getData()

    // }, []);

    

    const submitComment = (e) => {
        e.preventDefault()

        try {
            // Handle validations
            axios.post(`https://app.frakhat.ir/api/homepage/comment_news/${news.id}`, {
                Fname_Lname: name,
                email: email,
                review: comment
            }).then(response => console.log(response))
            //   toast.success("")
        } catch (error) {

            //   toast.error()
            console.log(error.message);

        }
    }

    const slice = commentList.slice(0, numOfComment)

    const loadMoreComment = () => {
        setNumOfComment(numOfComment + 1)
    }

    return (
        <div className={`${styles.newsDetails_comment} d-flex align-items-start`}>

            <div className={`${styles.newsDetails_users_comments} d-flex flex-column`}>
                <TitleLine title="نظرات" />
                <div className={`d-flex flex-column gap-3 align-items-center`}>
                    {
                        slice.map((commentItems, index) => {
                            return (
                                <Comment key={index} id={commentItems.id} name={commentItems.name} date={commentItems.date} imgSrc={commentItems.imgSrc} content={commentItems.content} />
                            )
                        })
                    }
                    <div className={styles.commentMore} onClick={loadMoreComment} >
                        <ArrowDownIcon />
                    </div>
                </div>

            </div>

            <div className={`${styles.newsDetails_comment_form} d-flex flex-column`}>
                <TitleLine title="نظر شما" />
                <form className={`d-flex flex-column align-items-center`} action="" method="post" onSubmit={submitComment}>
                    <div className={`${styles.newsDetails_comment_form_section1} d-flex`}>
                        <div className={`d-flex flex-column`}>
                            <label className="form-input-label">نام</label>
                            <input
                                className={styles.pagesFormInput}
                                type="text"
                                value={name}
                                required
                                onChange={e => setName(e.target.value)}
                            />
                        </div>
                        <div className={`d-flex flex-column`}>
                            <label className="form-input-label">ایمیل(نمایش داده نمی‌شود)</label>
                            <input
                                className={styles.pagesFormInput}
                                type="email"
                                value={email}
                                required
                                onChange={e => setEmail(e.target.value)}
                            />
                        </div>
                    </div>
                    <div className={`${styles.newsDetails_comment_form_section2} d-flex flex-column`}>
                        <label className="form-input-label">نظر شما</label>
                        <textarea
                            ref={commentMsg}
                            rows={4}
                            type="text"
                            minlength="30"
                            required />
                    </div>

                    <div className={`${styles.newsDetails_comment_form_section3} d-flex`}>
                        <Button
                            buttonType="commentButton"
                            type="submit"
                            onClick={e => setComment(commentMsg.current.value)}
                        >
                            ارسال
                        </Button>

                    </div>


                </form>

            </div>

        </div>
    )
}

export default NewsDetailsComment