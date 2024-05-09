import React from 'react';

const InputBox=({setCodeInput}) => {
    return(
        <div className="input-box">
			<textarea id="code-inp" onChange=
			{(e) => setCodeInput(e.target.value)}
            className="form-control" placeholder="Enter the inputs" style={{height:"150px"}}>
            
			</textarea>
		</div>
    )
}

export default InputBox;
