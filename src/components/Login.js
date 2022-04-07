import React from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import {useRef} from "react"
import  Image  from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/martlet3_single-noback.png";
import  Image2 from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/McGill_logoT-footer.gif"

export default function Signup()
{


    const usernameRef = useRef()
    const passwordRef = useRef()

    function authenticate(){
        //write your function here!
        const username = usernameRef.current.value
        const password = usernameRef.current.value

        window.alert('Hi')

    }
    return (
        <>
         <Card>
            <div style={{width:'100%'},{background:'black'}}>
            
            <span><img src={Image2}height={60} width={200}/></span>
            <span style={{color:'white'}}>School of Computer Science</span>

        </div>
        </Card>
        <Container>
        <Card>
            <Card.Body>
            <img src={Image} height={100} width={100} className="rounded mx-auto d-block"/>
            <h2 className="text-center mb-4">TA Management System</h2>
            <Form>
                <Form.Group id='username'>
                    <Form.Label>Username</Form.Label>
                    <Form.Control type='username' ref={usernameRef} required/>
                </Form.Group>
                <Form.Group id='password'>
                    <Form.Label>Password</Form.Label>
                    <Form.Control type='password' ref={passwordRef} required/>
                </Form.Group>
            </Form>
            <Button onclick = {authenticate} variant="danger"className='w-100'type="submit">LOGIN</Button>
            </Card.Body>

            
            <div>
            {' '}
            </div>
            <div className="w-100 text-center mt-2">
            Don't have an account? Register Here
            </div>
        </Card>
        </Container>

        </>
    )

}




