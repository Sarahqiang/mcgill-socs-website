import React from "react";
import {Form,Button,Card, Container } from "react-bootstrap";
import  Image2 from "/Users/yaoqiangwu/Desktop/mcgill-socs-website/src/McGill_logoT-footer.gif"

import {useRef} from "react"

export default function rateTa()
{
    const styleObj = {
        color: "Black",
        textAlign: "center",
        paddingTop: "20px",
    }
   
    
    return(
        <>
         <Card>
            <div style={{width:'100%'},{background:'black'}}>
            
            <span><img src={Image2}height={60} width={200}/></span>
            <span style={{color:'white'}}>School of Computer Science</span>

            </div>
            </Card>
        <Container>
           
             <div style={styleObj}>
              <p style={{fontSize: 50}}><b>Rate a TA</b></p>
              <p style={{fontSize: 20}}>Please enter the following</p>
             </div>
             <Card>
                 <Card.Body>
                    <Form>
                       <Form.Group id='COURSE'>
                         <Form.Label>COURSE</Form.Label>
                         <Form.Control  type='text'  required/>
                       </Form.Group>
                       <Form.Group id='TERM'>
                         <Form.Label>TERM</Form.Label>
                         <Form.Control type='TEXT'  required/>
                       </Form.Group>
                       <Form.Group>
                       <Form.Label>SELECT A TA</Form.Label>
                        <Form.Select aria-label="Default select example">
                         <option></option>
                         <option value="Linda Tang">Linda Tang</option>
                         <option value="Yaoqiang Wu">Yaoqiang Wu</option>
                         <option value="Yusen Tang">Yusen Tang</option>
                        </Form.Select>
                       </Form.Group>
                       <Form.Group id='RATING'>
                         <Form.Label>RATING(0-5)</Form.Label>
                         <Form.Control type='TEXT'  required/>
                       </Form.Group>
                       <Form.Group id='COMMENT'>
                         <Form.Label>COMMENT</Form.Label>
                         <Form.Control as="textarea" rows={3} type='TEXT'  required/>
                       </Form.Group>
                       <Form.Group id='COMMENT'>
                        <Button className="w-100 text-center mt-2" type="submit">Submit</Button>

                         
                       </Form.Group>
                    </Form>
                 </Card.Body>
             </Card>

            

         </Container>
        </>
       
    )
}
