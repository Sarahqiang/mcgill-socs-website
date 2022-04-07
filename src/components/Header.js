import React from "react";
import { Card } from "react-bootstrap";
//import  Image  from "C:/Users/TYS/Documents/study/University/COMP307/final project22222/mcgill-socs-website/src/McGill_logoT-footer.gif";
import  Image  from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/McGill_logoT-footer.gif"

export default function header(){
    return(
        <Card>
            <div style={{width:'100%'},{background:'black'}}>
            
            <span><img src={Image}height={60} width={200}/></span>
            <span style={{color:'white'}}>School of Computer Science</span>

        </div>
        </Card>
        
    )
}