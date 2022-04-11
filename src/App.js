import Login from './components/Login';
import Header from './components/Header.js';
import Dashboard_student from './components/Dashboard_student.js';
import Dashboard_professor from './components/Dashboard_professor.js';
import Dashboard_admin from './components/Dashboard_admin.js';
import Dashboard_system from './components/Dashboard_system.js';
import React, { Component }  from 'react';
import Rateta from './components/Rateta';
import { BrowserRouter as Router, Route, Routes,} from 'react-router-dom';
import Signup from './components/Signup';
import { AuthProvider } from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/contexts/AuthContext.js"

function App() {
  return(
    <Router>
      <AuthProvider>
        <Routes>
          <Route exact path="/" element={<Rateta/>}  />
          <Route path='/Signup' element={<Signup/>} />
          <Route path="/Login" element={<Login/>} />


        </Routes>
        
      </AuthProvider>
    </Router>
  //  <Router>
  //    <Routes>
  //      <Route path="/Login" element={<Login/>} />
  //      <Route path='/Rateta' element={<Rateta/>} />
  //      <Route path='/Registration' element={<Registration/>} />


  //   </Routes>
  //  </Router>
    

  )
  
}

export default App;
