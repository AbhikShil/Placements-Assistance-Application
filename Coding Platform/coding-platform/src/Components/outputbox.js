import React from 'react';
import spinner from '../spinner.svg';

const OutputBox=({loading, codeOutput, clearOutput }) => {
    return(
        <div style={{border:"1px solid #CED4DA", height:"150px", textAlign:"center", overflow:"scroll", backgroundColor:"white"}}>
            {loading ? (
			    <div className="spinner-box">
			        <img src={spinner} alt="Loading..." height="40px" width="40px"/>
			    </div>
		    ) : (
			    <div className="output-box" style={{marginTop:"20px"}}>
			        <pre>{codeOutput}</pre>
			        <button type="button" onClick={() => { clearOutput() }}
				        className="clear-btn btn btn-danger">
				        Clear
			        </button>
			    </div>
		)}
        </div>
    )
}

export default OutputBox;
