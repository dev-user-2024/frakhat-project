import { useForm } from 'react-hook-form';
import styles from './CoursesSectionConsultationForm.module.css'
import { useEffect, useState } from 'react';
import { api } from '../../services';
import { successAlert } from '../../providers/AlertServiceProvider';
import Response from '../../services/Response'
import { useNavigate } from 'react-router-dom';

const CoursesSectionForm = () => {
    const { register, handleSubmit, formState: { errors } } = useForm();
    const [courses, setCourses] = useState()
    const navigate = useNavigate()

    useEffect(() => {
        window.scrollTo(0, 0);
        (async () => {
            const { data: { data } } = await api().get('/course_list');
            setCourses(data);
        })()
    }, [])

    const onSubmit = async (data) => {
        try {
            // send credentials to login API
            const res = await api().post("/contact-us", data);
            if (res.status === 200) {
                successAlert('اطلاعات با موفقیت ثبت شد')
                navigate("/courses")
            }
        } catch (error) {
            console.warn('connection error!')
        }

    }

    const validateMobile = (value) => {
        const regex = /^9\d{9}$/;
        return regex.test(value) || "شماره همراه باید 11 رقم و با 9 شروع شود";
    };

    return (
        <div className={styles.FormSections}>
            <h2>فرم مشاوره</h2>
            <div className={styles.FormContainer}>
                <form onSubmit={handleSubmit(onSubmit)}>
                    <div className={styles.FormSectionInputs}>
                        <div>
                            <label htmlFor='full_name'>نام و نام خانوادگی<span>*</span></label>
                            <input
                                id='full_name'
                                {...register("full_name", {
                                    required: "فیلد نام و نام خانوادگی الزامی است",
                                    maxLength: { value: 40, message: "نام و نام خانوادگی نمیتواند بیشتر از 40 کاراکتر باشد" }
                                })}
                            />
                            {errors.full_name && <span role="alert" className={styles.InvalidInput}>{errors.full_name.message}</span>}
                        </div>
                        <div>
                            <label htmlFor='mobile'>شماره همراه<span>*</span></label>
                            <input
                                id='mobile'
                                type="number"
                                {...register("mobile", {
                                    required: "شماره همراه الزامی است",
                                    validate: validateMobile,
                                  })}
                            />
                            {errors.mobile && <span role="alert" className={styles.InvalidInput}>{errors.mobile.message}</span>}
                        </div>
                        <div>
                            <label htmlFor="phone">شماره تلفن ثابت</label>
                            <input
                                id='phone'
                                type="number"
                                {...register("phone")}
                            />
                        </div>
                        <div>
                            <label htmlFor="email">آدرس پست الکترونیک</label>
                            <input
                                id='email'
                                type="email"
                                {...register("email")}
                            />
                        </div>
                        <div>
                            <label htmlFor="course_id">دوره مد نظر</label>
                            <select name="course_id" id="course_id" {...register("course_id")}>
                                {
                                    courses?.map(item => (
                                        <option key={item.id} value={`${item.title_course}`}>{item.title_course}</option>
                                    ))
                                }
                            </select>
                        </div>
                        <div>
                            <label htmlFor="description">توضیحات</label>
                            <input
                                id='description'
                                type="text"
                                {...register("description")}
                            />
                        </div>
                    </div>
                    <div className={styles.SubmitButtons}>
                        <button type='submit'>ذخیره</button>
                        <button>انصراف</button>
                    </div>
                </form>
            </div>
        </div>
    )
}

export default CoursesSectionForm