
import { useState, useEffect } from "react"
import { Link, useLocation } from "react-router-dom"
import Logo from '../../assets/images/nav-logo.png'
import styles from './navigation.module.css'
import { useAuth } from '../../hooks/useAuth'
import searchIcon from '../../assets/icons/search-navbar.svg';
import bagIcon from '../../assets/icons/bag-icon.svg';
import loginIcon from '../../assets/icons/login-navbar.svg';
import { api } from "../../services"
import { Button, Divider, Drawer, List, ListItem, ListItemButton, ListItemText, styled } from "@mui/material"
import arrowIcon from '../../assets/icons/navbar-arrowdown.svg'


const Navigation = () => {
    const { hasAuth, goHome, logout, pending } = useAuth();
    const [menuItems, setMenuItems] = useState([])
    const [courseMenu, setCourseMenu] = useState([])
    const location = useLocation();


    useEffect(() => {
        (async () => {
            const { data } = await api().get('/menus');
            setMenuItems(data.data);
        })()
    }, []);

    useEffect(() => {
        (async () => {
            const { data } = await api().get('/course-menus');
            setCourseMenu(data);
            console.log(data);
        })()
    }, []);

    const [showMenu, setShowMenu] = useState(false);
    const [navList] = useState([
        { label: 'صفحه اصلی', path: '/' },
        { label: 'دوره ها', path: '/courses' },
        { label: 'کاریابی', path: '/jobs-landing' },
        { label: 'مجله خبری', path: '/mag' },
        { label: 'درباره ما', path: '/about' },
    ]);

    const toggleMenu = () => {
        setShowMenu(!showMenu);
    };


    const DrawerHeader = styled('div')(({ theme }) => ({
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'space-between',
        margin: "15px 15px",
        "& svg": {
            marginTop: 12,
            height: 30,
            width: 30,
            color: theme.palette.primary.main,
            cursor: 'pointer',
        }
    }));

    return (
        <div className={`${styles.navigation_container}`}>
            <div className={`${styles.navigation} `}>
                <div className={`${styles.navigation_links} `}>
                    <div className={`${styles.burgerIcon}`} onClick={toggleMenu} >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6">
                            <path strokeLinecap="round" strokeLinejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </div>
                    <div className={`${styles.logo}`}>
                        <Link to={'/'}>
                            <img src={Logo} alt="Logo" />
                        </Link>
                    </div>
                    <div className={`${styles.navigation_links_item}`}>
                        <ul>
                            <li>
                                <Link to={'/'}>
                                    صفحه اصلی
                                </Link>
                            </li>
                            <li>
                                <div className={styles["dropdown"]}>
                                    <div className={styles["dropbtn"]}>
                                        دوره ها
                                        <img src={arrowIcon} alt="" />
                                    </div>
                                    <div className={styles["dropdown-content"]}>
                                        {
                                            courseMenu?.map(item => (
                                                <li className={styles["dropdown_children"]}>
                                                    {item.type}
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                                                        <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                                                    </svg>
                                                    <div className={styles["dropdown_content_children"]}>
                                                        {
                                                            item?.courses?.map(course => (
                                                                <Link to={`/courses/courseDetails/${course.id}`} target="_blank" className={styles["dropdown_children"]}>
                                                                    {course.title_course}
                                                                </Link>
                                                            ))
                                                        }
                                                    </div>
                                                </li>
                                            ))
                                        }
                                    </div>
                                </div>
                            </li>
                            <li>
                                <Link to={'/jobs-landing'}>
                                    کاریابی
                                </Link>
                            </li>
                            <li>
                                <div className={styles["dropdown"]}>
                                    <div className={styles["dropbtn"]}>
                                        مجله خبری
                                        <img src={arrowIcon} alt="" />
                                    </div>
                                    <div className={styles["dropdown-content"]}>
                                        {
                                            menuItems?.map(item => (
                                                <Link to={`/mag/category-landing/${item.id}`} target="_blank">
                                                    {item.title}
                                                </Link>
                                            ))
                                        }
                                    </div>
                                </div>
                            </li>
                            <li>
                                <Link to={'/about'}>
                                    درباره ما
                                </Link>
                            </li>
                        </ul>
                    </div>
                    <div className={`${styles.loginIcon}`}>
                        {
                            hasAuth ?
                                <Link to={'/buyCourse'}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </Link>
                                :
                                <Link to={'/login'}>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth="1.5" stroke="currentColor" className="w-6 h-6">
                                        <path strokeLinecap="round" strokeLinejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                    </svg>
                                </Link>
                        }
                    </div>
                </div>
                <div className={`${styles.navigation_items}`}>
                    <Button>
                        <img src={searchIcon} alt="" />
                    </Button>
                    <Button variant="contained">
                        <Link to={'/buyCourse'}>
                            <img src={bagIcon} alt="" />
                        </Link>
                    </Button>
                    <Button variant="contained">
                        <Link to={'/login'}>
                            <img src={loginIcon} alt="" />
                            ورود | ثبت‌نام
                        </Link>
                    </Button>
                </div>
            </div>
            <Drawer
                sx={{
                    '& .MuiDrawer-paper': {
                        width: 264,
                    },
                    '& .MuiListItemButton-root': {
                        textAlign: 'right',

                    },
                }}
                anchor="right"
                open={showMenu}
                onClose={() => setShowMenu(false)}
            >
                <DrawerHeader>
                    <div>
                        <Link to={'/'}>
                            <img src={Logo} alt="Logo" />
                        </Link>
                    </div>
                    <div>
                        <svg onClick={toggleMenu} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </DrawerHeader>
                <Divider variant="inset" />
                <List>
                    {
                        navList.map((item, i) => (
                            <Link to={item.path} onClick={toggleMenu}>
                                <ListItem>
                                    <ListItemButton>
                                        <ListItemText primary={item.label} />
                                    </ListItemButton>
                                </ListItem>
                            </Link>

                        ))
                    }
                </List>
            </Drawer>
        </div >
    )
}

export default Navigation