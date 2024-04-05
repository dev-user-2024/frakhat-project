import { useRoutes } from "react-router-dom";

import LayoutDefault from "./Layouts/DefaultLayout";
import Home from "./routes/home/home";
import NewsDetails from "./routes/newsDetails/NewsDetails";
import Courses from "./routes/courses/Courses";
import CourseDetails from "./routes/courseDetails/CourseDetails";
import GalleryDetails from "./routes/galleryDetails/GalleryDetails";
import Sheets from "./routes/sheets/Sheets";
import BuyCourse from "./routes/BuyCourse/BuyCourse";
import Login from "./routes/login/Login";
import Signup from "./routes/signup/Signup";
import About from "./routes/about/About";
import ContactUs from "./routes/Contact-us/ContactUs";
import SearchPage from "./routes/searchPage/SearchPage";
import ProtectedRoute from "./routes/ProtectedRoute";
import Panel from "./panel/Panel";
import CallbackPage from "./routes/callback-page/CallbackPage"
import Tag from "./routes/tag/Tag";
import ConsultationForm from "./routes/ConsultationForm/CoursesSectionConsultationForm";
import Jobs from "./routes/jobs/Jobs";
import JobsLanding from "./routes/jobsLanding/JobsLanding";
import JobsDetails from "./routes/jobsDetails/JobsDetails";
import ForgottenPassword from "./components/ForgottenPassword/ForgottenPassword";
import NewsCategoryLanding from "./routes/newsCategoryLanding/NewsCategoryLanding";
import PanelCourseVideosNavigation from "./panel/panel_course_videos_navigation/PanelCourseVideosNavigation";
import Ad from "./routes/Ad/Ad";
import Search from "./routes/Search/Search";
import SuccessfulPurchase from "./routes/SuccessfulPurchase/SuccessfulPurchase";
import UnsuccessfulPurchase from "./routes/UnsuccessfulPurchase/UnsuccessfulPurchase";
import GuideList from "./routes/GuideList/GuideList";
import RegisterGuide from "./routes/RegisterGuide/RegisterGuide";
import CoursesLanding from "./routes/CoursesLanding/CoursesLanding";
import Teachers from "./components/CoursesLanding/Teachers/Teachers";


const routes = [
    {
        path: '/',
        element: <LayoutDefault />,
        children: [
            {
                path: 'mag',
                element: <Home />
            },
            {
                path: 'mag/magDetails/:title_news',
                element: <NewsDetails />
            },
            {
                path: '/',
                element: <CoursesLanding />
            },
            {
                path: '/courses',
                element: <Courses />
            },
            {
                path: '/courses/courseDetails/:slug',
                element: <CourseDetails />
            },
            {
                path: 'mag/galleryDetails/:id',
                element: <GalleryDetails />
            },
            {
                path: 'sheets',
                element: <Sheets />
            },
            {
                path: 'buyCourse',
                element: <BuyCourse />
            },
            {
                path: 'about',
                element: <About />
            },
            {
                path: 'contact-us',
                element: <ContactUs />
            },
            {
                path: 'search-result/:search_text',
                element: <SearchPage />
            },
            {
                path: 'callback-page',
                element: <CallbackPage />
            },
            {
                path: 'tags',
                element: <Tag />
            },
            {
                path: 'consultation-form',
                element: <ConsultationForm />
            },
            {
                path: 'jobs',
                element: <Jobs />,
                children: [
                    {
                        path: 'jobs/search',
                        element: <Jobs />
                    }
                ]
            },
            {
                path: 'jobs/search',
                element: <Jobs />
            },
            {
                path: 'jobs-landing',
                element: <JobsLanding />
            },
            {
                path: 'jobs-details/:id',
                element: <JobsDetails />
            },
            {
                path: 'mag/category-landing/:id',
                element: <NewsCategoryLanding />
            },
            {
                path: 'search',
                element: <Search />
            },
            {
                path: 'successful-purchase',
                element: <SuccessfulPurchase />
            },
            {
                path: 'unsuccessful-purchase',
                element: <UnsuccessfulPurchase />
            },
            {
                path: 'guide-list',
                element: <GuideList />
            },
            {
                path: 'registration-guide',
                element: <RegisterGuide />
            },
            {
                path: 'teachers',
                element: <Teachers />
            },
            
        ]
    },
    {
        path: 'login',
        element: <Login />
    },
    {
        path: 'signup',
        element: <Signup />
    },
    {
        path: 'forgottenpassword',
        element: <ForgottenPassword />
    },
    {
        path: 'ad',
        element: <Ad />
    },
    {
        path: '/*',
        element: <ProtectedRoute />,
        children: [
            {
                path: 'user-panel',
                element: <Panel />
            },
            {
                path: 'user-panel-course/:license',
                element: <PanelCourseVideosNavigation />
            }
        ]
    },
]

const Routes = () => {
    const routing = useRoutes(routes)

    return (
        <div>
            {routing}
        </div>
    )
}

export default Routes