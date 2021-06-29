//import Hello from '../components/views/Hello'
import EditImage from '../components/EditImage'
import Main from '../components/MainContent'
export const routes =[
   {
     path: '/',
     component: Main
   },
   {
    path: '/edit/:id',
    component: EditImage
   }

]


