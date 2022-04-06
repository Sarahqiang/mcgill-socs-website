import React from "react";
import  ReactDOM  from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import { Text, View, StyleSheet, Pressable } from 'react-native';
import {useRef} from "react"
import 'C:/Users/TYS/Documents/study/University/COMP307/final project22222/mcgill-socs-website/src/dashboard_style.css'

export default function System()
{
        
    
    function rateTaClick()
    {
        console.log('rate my ta')

    }
    function manageClick()
    {
        console.log('manage ta')
    }
    function adminClick()
    {
        console.log('admin ta')
    }
    function systemClick()
    {
        console.log('system')
    }
    return(
        <Container>
            <div align="center">
                <span className="dashboard_title">Dashboard</span>
                <span className="select">Select one of the following</span>
            <button onClick={rateTaClick} className='button_rate_ta4' >
                Rate a TA
            </button>
            <button onClick={manageClick} className='button_manage_ta4' >
                TA Management
            </button>
            <button onClick={adminClick} className='button_admin_ta4' >
                TA Administration
            </button>
            <button onClick={systemClick} className='button_system_ta4' >
                System Operator Task
            </button>
            </div>
            <div className="green_color_bar4"></div>
            <div className="blue_color_bar4"></div>
            <div className="orange_color_bar4"></div>
            <div className="yellow_color_bar4"></div>
        </Container>
    )

/*     function manageClick()
    {
        console.log('manage ta')
        return(
            <Container>
            <button onClick={rateClick} className='button_manage_ta4' >
                TA Management
            </button>
            <div className="blue_color_bar4"></div>
            </Container>
        )
    } */
}