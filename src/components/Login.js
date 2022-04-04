import React from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import {useRef} from "react"
import  Image  from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/martlet3_single-noback.png";
export default function Signup(){
    const emailRef = useRef()
    const passwordRef = useRef()
    return (
        <>
        <Container>
        <Card>
            <Card.Body>
            <img src={Image} height={100} width={100} className="rounded mx-auto d-block"/>
            <h2 className="text-center mb-4">TA Management System</h2>
            <Form>
                <Form.Group id='email'>
                    <Form.Label>Email</Form.Label>
                    <Form.Control type='email' ref={emailRef} required/>
                </Form.Group>
                <Form.Group id='password'>
                    <Form.Label>Password</Form.Label>
                    <Form.Control type='password' ref={passwordRef} required/>
                </Form.Group>
                
                
            </Form>
            <Button variant="danger"className='w-100'type="submit">LOGIN</Button>
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