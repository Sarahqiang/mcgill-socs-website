import React from "react";
import  ReactDOM  from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import { Text, View, StyleSheet, Pressable } from 'react-native';
import {useRef} from "react"
import 'C:/Users/TYS/Documents/study/University/COMP307/final project22222/mcgill-socs-website/src/dashboard_style.css'

export default function Student()
{
    const styles = StyleSheet.create(
        {
            button1:{
                backgroundColor: 'green'
              }
        }
    )
        
    
    function handleClick()
    {
        console.log('rate my ta')
    }
    function manageClick()
    {
        console.log('manage ta')
    }
    return(
        <Container>
            <div align="center">
                <span className="dashboard_title">Dashboard</span>
                <span className="select">Select one of the following</span>
            <button onClick={handleClick} className='button_rate_ta2' >
                Rate a TA
            </button>
            <button onClick={manageClick} className='button_manage_ta2' >
                TA Management
            </button>
            </div>
            <div className="green_color_bar2"></div>
            <div className="blue_color_bar2"></div>
        </Container>
    )
}