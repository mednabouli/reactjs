<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>COmment System</title>
        <link href="css/bootstrap.css" rel="stylesheet">
        <script src="js/react.min.js"></script>
        <script src="js/react-dom.min.js"></script>
        <script src="js/react-with-addons.js"></script>
        <script src="js/browser.min.js"></script>

        <style type="text/css">
        .MarginRight{
            margin-right:10px;
        }
        
        </style>

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1>Comments</h1>
                    <div id="App"></div>
                </div>
            </div>
        </div>
                                    
        <script type="text/babel">
        var Comment = React.createClass({

            getInitialState:function(){
                return({Editing:false,
                        NewText:''})
            },
            GetValue:function(e){
                this.setState({NewText:e.target.value})
            },

            Edit:function(){
                //alert("you click #Edit button");
                this.setState({Editing:true})
            },
            Remove:function(){
                //alert("you click #Remove button");
                this.props.DeleteComment(this.props.index);
            },
            Save:function(){
                //alert("New text is:" +this.state.NewText);
                this.props.UpdateComment(this.state.NewText, this.props.index);
                this.setState({Editing:false})
            },
            Cancel:function(){
                //alert("you click #Cancel Button");
                this.setState({Editing:false})
            },
            
            CommentNormal:function(){
                return(<div className="well">
                            <p>{this.props.children}</p>
                            <button onClick={this.Edit} className="btn btn-primary btn-sm MarginRight">Edit</button>
                            <button onClick={this.Remove}className="btn btn-danger btn-sm">Remove</button>
                       </div>)
            },
            CommentForm:function(){
              return ( <div className="well">
                        <p><small>Editing Comment</small></p>
                        <textarea onChange={this.GetValue}  className="form-control" >
                        {this.props.children}
                        </textarea>
                        <br/>
                        <button onClick={this.Save} className="btn btn-success btn-sm MarginRight">Save</button>
                        <button onClick={this.Cancel}className="btn btn-warning btn-sm">Cancel</button>
                     </div>
                     )
            },
            render:function(){
                
                if(this.state.Editing){
                    return this.CommentForm();
                }else{
                    return this.CommentNormal();
                }
                     
            }
        });

        var CommentBox = React.createClass({
            getInitialState:function(){
                return{
                    Comments:[
                        
                    ]
              }
            },
            RemoveComment:function(i){
                console.log('Removing Comment'+i);
                var arr = this.state.Comments;
                arr.splice(i,1);
                this.setState({Comments: arr});
            },
            UpdatingComment:function(newText,i){
                console.log('Removing Comment'+i);
                var arr = this.state.Comments;
                arr[i] = newText;
                this.setState({Comments: arr});
            },
            AddNew:function(){
                var arr = this.state.Comments;
                arr.push('Its new');
                this.setState({Comments: arr});
            },
            eachComment:function(Text,i){
                    return(
                        <Comment key={i} index={i} UpdateComment={this.UpdatingComment} DeleteComment={this.RemoveComment}>
                        {Text}
                        </Comment>)
            },
            render:function(){
                return(
                    <div>
                        <button onClick={this.AddNew} className="btn btn-primary btn-sm">Add Comment</button>
                        { this.state.Comments.map(this.eachComment)}
                    </div>
                )
                
                
            }
        });
        
        ReactDOM.render(<CommentBox/>, document.getElementById('App'));
       
        </script>
    </body>
    </html>