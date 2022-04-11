import firebase from  'firebase/compat/app' 
import 'firebase/compat/auth' 
const app = firebase.initializeApp(
    {
        apiKey:"AIzaSyB7Xt4tFuu6nezq845JOqsbMFt3Nd799Js",
        authDomain:"auth-deve-c249d.firebaseapp.com",
        projectId: "auth-deve-c249d",
        storageBucket: "auth-deve-c249d.appspot.com",
        messagingSenderId: "19959644942",
        appId: "1:19959644942:web:18198466623fa4c4b9cd5f",
        measurementId: "G-GYHQFSX9PY"
    }
)
export const auth = app.auth()
export default app