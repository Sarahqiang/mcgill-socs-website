import React from "react";
import { Form,Button,Card, Container } from "react-bootstrap";
import {useRef} from "react"
import  Image  from "/Users/linda/Desktop/comp307finalproject/src/martlet3_single-noback.png";
export default function Registration(){

    const firstnameRef = useRef()
    const lastnameRef = useRef()
    const emailRef = useRef()
    const studentidRef = useRef()
    const usernameRef = useRef()
    const passwordRef = useRef()
    const coursesRef = useRef()

   
    return (
        <>
        
        <Container>
        
        <Card>

            <Card.Body>

          

                
            <img src={Image} height={75} width={100} className="rounded mx-auto d-block"/>
            <h2 className="text-center mb-4">Set up your account</h2>
            <div className="w-100 text-center mt-2">
                Please enter the following information to register as a new user.
            </div>
            <Form>
                <Form.Group id='firstname'>
                    <Form.Label>First Name</Form.Label>
                    <Form.Control type='text' placeholder='Enter first name' ref={firstnameRef} required/>
                </Form.Group>
                <Form.Group id='lastname'>
                    <Form.Label>Last Name</Form.Label>
                    <Form.Control type='text' placeholder='Enter last name' ref={lastnameRef} required/>
                </Form.Group>
                <Form.Group id='email'>
                    <Form.Label>Email Address</Form.Label>
                    <Form.Control type='email' placeholder='Enter email address' ref={emailRef} required/>
                </Form.Group>
                <Form.Group id='studentid'>
                    <Form.Label>Student ID #</Form.Label>
                    <Form.Control type='text' placeholder='Enter student ID #' ref={studentidRef} required/>
                </Form.Group>
                <Form.Group id='username'>
                    <Form.Label>Username</Form.Label>
                    <Form.Control type='username' placeholder='Enter username' ref={usernameRef} required/>
                </Form.Group>
                <Form.Group id='password'>
                    <Form.Label>Password</Form.Label>
                    <Form.Control type='password' placeholder='Enter password' ref={passwordRef} required/>
                </Form.Group>
                <Form.Group id='coursesregisteredin'>
                    <Form.Label>Courses Registered In (Select all that apply)</Form.Label>
                    <Form.Control type='text' ref={coursesRef} required/>
                </Form.Group>
                
            </Form>

            <Button variant="danger"className='w-100'type="submit">Register Now</Button>
            </Card.Body>

            
            <div>
            {' '}
            </div>

            
            
        </Card>
        
        </Container>
        
        </>
    )

}