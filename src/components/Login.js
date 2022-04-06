import React from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import {useRef} from "react"
import  Image  from "C:/Users/TYS/Documents/study/University/COMP307/final project22222/mcgill-socs-website/src/martlet3_single-noback.png";
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




