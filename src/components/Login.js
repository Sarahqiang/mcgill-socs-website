import React, { useRef, useState } from "react"
import { Form, Button, Card, Alert, Container } from "react-bootstrap"
import { useAuth } from "../contexts/AuthContext"
import { Link} from "react-router-dom"
import {useNavigate} from "react-router-dom"
import  Image2 from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/McGill_logoT-footer.gif"
import  Image  from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/martlet3_single-noback.png";



export default function Login() {
  const emailRef = useRef()
  const passwordRef = useRef()
  const { login } = useAuth()
  const [error, setError] = useState("")
  const [loading, setLoading] = useState(false)
  const navigate = useNavigate()

  async function handleSubmit(e) {
    e.preventDefault()

    try {
      setError("")
      setLoading(true)
      await login(emailRef.current.value, passwordRef.current.value)
      navigate("/")
    } catch {
      setError("Failed to log in")
    }

    setLoading(false)
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
          {error && <Alert variant="danger">{error}</Alert>}
          <Form onSubmit={handleSubmit}>
            <Form.Group id='username'>
                    <Form.Label>Username</Form.Label>
                    <Form.Control type='username' required/>
            </Form.Group>
            <Form.Group id="email">
              <Form.Label>Email</Form.Label>
              <Form.Control type="email" ref={emailRef} required />
            </Form.Group>
            <Form.Group id="password">
              <Form.Label>Password</Form.Label>
              <Form.Control type="password" ref={passwordRef} required />
            </Form.Group>
            <Button disabled={loading} variant="danger" className="w-100" type="submit">
              Log In
            </Button>
          </Form>
          <div className="w-100 text-center mt-3">
            <Link to="/forgot-password">Forgot Password?</Link>
          </div>
        </Card.Body>
      </Card>
      <div className="w-100 text-center mt-2">
      Don't have an account? <Link to="/signup">Register Here</Link>
      </div>
      </Container>
    </>
  )
}



