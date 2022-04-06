import Login from './components/Login';
import Header from './components/Header.js';
import Dashboard_student from './components/Dashboard_student.js';
import Dashboard_professor from './components/Dashboard_professor.js';
import Dashboard_admin from './components/Dashboard_admin.js';
import Dashboard_system from './components/Dashboard_system.js';
import React, { Component }  from 'react';

function App() {
  return(
    <div>
       <Header/>
    <Dashboard_professor/>
    </div>

  )
  
}

export default App;
