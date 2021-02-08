import React from 'react';
import style from '../styles/Contact.module.css';

export default function ContactForm() {


    const [name, setName] = React.useState('');
    const [email, setEmail] = React.useState('');
    const [phone, setPhone] = React.useState('');
    const [message, setMessage] = React.useState('');
    const [alert, setAlert] = React.useState('');

    const handleName = (e) => {
        setName(e.target.value);
    }
    const handleEmail = (e) => {
        setEmail(e.target.value);
    }
    const handlePhone = (e) => {
        setPhone(e.target.value);
    }
    const handleMessage = (e) => {
        setMessage(e.target.value);
    }
    
    const submitForm = (e) => {
        e.preventDefault();

        const dataContact = {
            name:name,
            email:email,
            phone:phone,
            message:message,
        }

        fetch(`${process.env.NEXT_PUBLIC_API_URL}/contact`, 
            {method:'POST', body:JSON.stringify(dataContact)})
            .then((response) => 
            {
                if(response.status === 200){
                    setAlert('Success!')
                }else{
                    setAlert('Error!')
                }
            })
            .catch((err) => {
                console.error(err);
            });

    };

    return <div className={style.contact}>
        <h1 className={style.title}>Contact</h1>

      
        <form onSubmit={submitForm}>
            <div className={style.inputGroup}>
                <label htmlFor="name">Name</label>
                <input type="text" id="name" placeholder="Fill your full name" value={name} onChange={handleName}/>
            </div>
            <div className={style.inputGroup}>
                <label htmlFor="email">Email</label>
                <input type="email" id="email" placeholder="Fill a valid e-mail" value={email} onChange={handleEmail}/>
            </div>
            <div className={style.inputGroup}>
                <label htmlFor="phone">Phone</label>
                <input type="text" id="phone" placeholder="Fill your phone" maxLength={16} value={phone} onChange={handlePhone}/>
            </div>
            <div className={style.inputGroup}>
                <label htmlFor="message">Message</label>
                <textarea id="message" rows="10" placeholder="..." value={message} onChange={handleMessage}/>
            </div>
            
            <input type="submit" value="Submit" className={style.submit}/>
            {alert !== '' &&
            <div className={style.alert}>
                {alert}
            </div>
        }
        </form>
    </div>;
}
