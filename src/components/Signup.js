import React, { useRef, useState } from "react"
import { Form, Button, Card, Alert } from "react-bootstrap"
import { useAuth } from "../contexts/AuthContext"
import  Image  from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/martlet3_single-noback.png";

export default function Signup() {
  const emailRef = useRef()
  const passwordRef = useRef()
  const passwordConfirmRef = useRef()
  const { signup } = useAuth()
  const [error, setError] = useState("")
  const [loading, setLoading] = useState(false)
  //const history = useHistory()

  async function handleSubmit(e) {
    e.preventDefault()

    if (passwordRef.current.value !== passwordConfirmRef.current.value) {
      return setError("Passwords do not match")
    }

    try {
      setError("")
      setLoading(true)
      await signup(emailRef.current.value, passwordRef.current.value)
      //history.push("/")
    } catch {
      setError("Failed to create an account")
    }

    setLoading(false)
  }

  return (
    <>
      <Card>
        <Card.Body>
          <img src={Image} height={75} width={100} className="rounded mx-auto d-block"/>
          <h2 className="text-center mb-4">Set up your account</h2>
          <div className="w-100 text-center mt-2">
                 Please enter the following information to register as a new user.
          </div>
          {error && <Alert variant="danger">{error}</Alert>}
          <Form onSubmit={handleSubmit}>
          <Form.Group id='firstname'>
               <Form.Label>First Name</Form.Label>
               <Form.Control type='text' placeholder='Enter first name' required/>
          </Form.Group>
          <Form.Group id='lastname'>
                <Form.Label>Last Name</Form.Label>
                <Form.Control type='text' placeholder='Enter last name' required/>
          </Form.Group>
          <Form.Group id='studentid'>
              <Form.Label>Student ID #</Form.Label>
              <Form.Control type='text' placeholder='Enter student ID #' required/>
          </Form.Group>
            <Form.Group id="email">
              <Form.Label>Email</Form.Label>
              <Form.Control type="email" ref={emailRef} required />
            </Form.Group>
            <Form.Group id='username'>
                <Form.Label>Username</Form.Label>
                 <Form.Control type='username' placeholder='Enter username' required/>
            </Form.Group>
            <Form.Group id="password">
              <Form.Label>Password</Form.Label>
              <Form.Control type="password" ref={passwordRef} required />
            </Form.Group>
            <Form.Group id="password-confirm">
              <Form.Label>Password Confirmation</Form.Label>
              <Form.Control type="password" ref={passwordConfirmRef} required />
            </Form.Group>
            <Form.Group>
                <Form.Label>Select a course</Form.Label>
                <Form.Select placeholder='Select a course' aria-label="Default select example">
                    <option></option>
                    <option value="comp551">comp551</option>
                    <option value="comp421"> comp421</option>
                    <option value="comp307">comp307</option>
                    </Form.Select>
                </Form.Group>
            <Button disabled={loading} variant="danger" className="w-100" type="submit">
              Sign Up
            </Button>
          </Form>
        </Card.Body>
      </Card>
      <div className="w-100 text-center mt-2">
        Already have an account?Log In
      </div>
    </>
  )
}