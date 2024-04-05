
import { useState, useEffect } from 'react'
import styles from "./panelProfile.module.css"
import { useForm } from "react-hook-form";
import Button from './../../components/buttons/button.component';
import { api } from './../../services';
import { useAuth } from "./../../hooks/useAuth"
import { successAlert, errorAlert } from './../../providers/AlertServiceProvider'
import Response from '../../services/Response';
import Spinner from 'react-bootstrap/Spinner';
import useLocalStorage from '../../hooks/useLocalStorage';
import { InitailAuthParams } from '../../providers/AuthServiceProvider';
import profile from '../../assets/images/profile.png'
import editProfile from '../../assets/icons/edit-profile-icon.svg'

const userDefaultValues = {
    name: "",
    family: "",
    city: "",
    tell: '',
    birth_day: "",
    national_code: "",
};

const PanelProfile = () => {
    const { user, token } = useAuth();
    const [editableMode, setEditableMode] = useState(false);
    const [loading, setLoading] = useState(false);
    const [userInformation, setUserInformation] = useState(userDefaultValues);
    const [auth, setAuth] = useLocalStorage('_auth', InitailAuthParams);

    const { register, handleSubmit, formState: { errors }, setValue } = useForm({
        defaultValues: userInformation
    });
    const getUserData = async () => {
        const res = await api(token).get('/user');
        const response = new Response(res);
        if (!response.hasFailed()) {
            const { profile } = response.data.data;
            setUserInformation({
                name: profile.Fname,
                family: profile.Lname,
                password: profile.password,
                city: profile.city,
                tell: profile.tell,
                birth_day: profile.birth_day,
                national_code: profile.code_melli,

            });
            setValue('name', profile.Fname);
            setValue('family', profile.Lname);
            setValue('password', profile.password);
            setValue('city', profile.city);
            setValue('tell', profile.tell);
            setValue('birth_day', profile.birth_day);
            setValue('national_code', profile.code_melli);
        }

    }

    const handleShowEditForm = () => setEditableMode(true);
    const handleCloseEditForm = () => setEditableMode(false);

    const onSubmit = async (data) => {
        const api_token = localStorage.getItem('access_token')

        setLoading(true);
        const res = await api().post('/user-auth/update-user', { api_token, ...data, image: '' });
        const response = new Response(res);
        if (!response.hasFailed()) {
            handleCloseEditForm();
            successAlert(response.message)
            setAuth({ hasAuth: true, user: response.data.user })
        } else {
            errorAlert(response.message)
        }
        getUserData();
        setLoading(false);
    };

    const BaseField = ({ text }) => {
        return (
            <div className={styles.PanelProfileInutContainer}>
                <input className={styles.pagesFormInput} disabled />
                <p className={styles.invalid_input}>{text}</p>
            </div>
        )
    }

    return (
        <div className={styles.PanelProfile}>
            <div className={`${styles.PanelProfile_avatar} d-flex align-items-baseline gap-1`}>
                <img src={profile} alt="" />
                {
                    editableMode && (<button onClick={handleCloseEditForm}
                        id="btn_login"
                        buttonType="navigationButton"
                        type="button"
                        className={styles.editProfile} >
                        لغو ویرایش
                    </button>)
                }

                {
                    !editableMode && (<button onClick={handleShowEditForm}
                        id="btn_login"
                        buttonType="navigationButton"
                        type="button"
                        className={styles.editProfile} >
                        <img src={editProfile} alt="" style={{ width: 24, height: 24, marginLeft: 5 }} />
                        ویرایش نمایه
                    </button>)
                }

            </div>
            <form className={styles.formInput} onSubmit={handleSubmit(onSubmit)}>
                <div className={styles.rowInput}>
                    <div>
                        <label className="form-input-label">نام</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("name")}
                                    />
                                </div>
                            ) : <BaseField text={user?.name} />
                        }

                    </div>
                    <div>
                        <label className="form-input-label">نام خانوادگی</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("family")}
                                    />
                                </div>
                            ) : <BaseField text={user?.family} />
                        }

                    </div>
                </div>
                <div className={styles.rowInput}>
                    <div>
                        <label className="form-input-label">رمز عبور</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="password"
                                        {...register("password")}
                                    />
                                </div>
                            ) : <BaseField text={"********"} />
                        }
                    </div>
                    <div>
                        <label className="form-input-label">آدرس پست الکترونیک</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("email")}
                                    />
                                </div>
                            ) : <BaseField text={user?.email} />
                        }
                    </div>
                </div>
                <div className={styles.rowInput}>
                    <div>
                        <label className="form-input-label">کدملی</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("national_code")}
                                    />
                                </div>
                            ) : <BaseField text={user.national_code} />
                        }
                    </div>
                    <div>
                        <label className="form-input-label">شماره تلفن ثابت</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("tell")}
                                    />
                                    <p className={styles.invalid_input}>{errors.tell?.message}</p>
                                </div>
                            ) : <BaseField text={user?.tell} />
                        }
                    </div>
                </div>
                <div className={styles.rowInput}>
                    <div>
                        <label className="form-input-label">سال تولد</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("birth_day")}

                                    />
                                </div>
                            ) : <BaseField text={user?.birth_day} />
                        }

                    </div>
                    <div>
                        <label className="form-input-label">شهر</label>
                        {
                            editableMode ? (
                                <div className={styles.PanelProfileInutContainer}>
                                    <input
                                        className={styles.pagesFormInput}
                                        type="text"
                                        {...register("city")}
                                    />
                                </div>
                            ) : <BaseField text={user?.city} />
                        }

                    </div>
                </div>
                {
                    editableMode &&
                    <div className={styles.submitForm}>
                        <Button buttonType="headerButton" style={{ width: "auto", marginTop: "20px" }} type={loading ? "button" : "submit"} >
                            ذخیره
                            {loading && <Spinner size="sm" />}
                        </Button>
                    </div>
                }

            </form>
            <p style={{textAlign: 'center', marginTop: 30, color: '#a8a8a8', textDecoration: 'underline'}}>پس از اعمال تغییرات صفحه رو رفرش کنید</p>
        </div>
    )
}

export default PanelProfile