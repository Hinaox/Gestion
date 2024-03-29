<?php

// echo json_encode($Organigram);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='assets/ZoomSlider.css'/>
    <style>
      #myDiagramDiv{
        width: 1000px;
        height: 900px;
        border:none #F7F7F7;
      }
      
      #EmployeInfo  {
   background: #F7F7F7;
    width: 350px;
    height:900px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
   
 
    /* position: fixed; */
}
.sidebar h2,p{
  text-align: center;
}
.sidebar #nom,#poste,#Categorie{
  text-overflow: ellipsis;
  font-size:120%;
  
}
#nomEmploye{
  color: #009eff;
  font-weight: bold;
}
#posteEmploye{
  color:#00d2ff;
  font-weight: bold;
}
#CategorieEmployee{
  color:#00d2ff;
  font-weight: bold;
}
.sidebar img{
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%
}
      
      .flex-container {
      
  display: flex;
  align-items: stretch;
      }
       #myOverviewDiv {
      position: absolute;
      width: 200px;
      height: 200px;
      top:85%;
      right:3%;
      background-color: #f2f2f2;
      z-index: 300; /* make sure its in front */
      border: solid 1px #7986cb;
    }

    </style>
</head>
<body>

<script src="<?php echo base_url("assets/dist/js/go-Debug.js"); ?>"></script>
<script src="<?php echo base_url("assets/dist/js/Function.js"); ?>"></script>
<script src="<?php echo base_url("assets/dist/js/ZoomSlider.js"); ?>"></script>
 </script>



<div class="flex-container">

  <div id="myDiagramDiv" >
  </div>
  <div id="myOverviewDiv"></div>
    <div id="EmployeInfo"  style="display:block">
    
    <div class="sidebar">
      <img src="images/staff.png" alt="" id="staff-img">
      <hr>
      <h2>Fiche Employee</h2>
      <p class="font-weight-bold" id="nom">Nom:<span id="nomEmploye"></span></p>
      <p class="font-weight-bold" id="poste">Poste:<span id="posteEmploye"></span></p>
      <p class="font-weight-bold" id="Categorie">Categorie:<span id="CategorieEmp"></span></p>
    
      <?php if ($this->session->userdata('inRH')==true){ ?>
        <form action="<?php echo base_url('Offre')?>" method="get">
        <input type="hidden" name="FormPost" id="FormCategorieEmp" value="">
        <input type="hidden" name="FormNomEmp" id="FormPost" value="">
        <input type="submit" value="AppelOffre" onclick="AppelOffre()" style="display: block; margin-left: auto;
      margin-right: auto;
      width: 50%" id="BouttonAjouterOffre">
        </form>
    <?php } ?>
  <hr> 
  <h2>Diagram Overview</h2>
    <p><button id="zoomToFit">Zoom to Fit</button> <button id="centerRoot">Center on root</button></p>
    </div>
  </p>
    </div>
</div>

</body>


<script>
  document.getElementById('zoomToFit').addEventListener('click', function() {
        myDiagram.commandHandler.zoomToFit();
      });

      document.getElementById('centerRoot').addEventListener('click', function() {
        myDiagram.scale = 1;
        myDiagram.commandHandler.scrollToPart(myDiagram.findNodeForKey(1));
      });

var $ = go.GraphObject.make;


// ------------------------------------------- -intilialisation diagrame-----------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
var  myDiagram =
        $(go.Diagram, "myDiagramDiv",
        {
            initialAutoScale: go.Diagram.Uniform,
            maxSelectionCount: 1, // users can select only one part at a time
            validCycle: go.Diagram.CycleDestinationTree, // make sure users can only create trees
            "clickCreatingTool.archetypeNodeData": { // allow double-click in background to create a new node
              name: "(new person)",
              title: "",
              comments: ""
            }
          },
        {// must be the ID or reference to div
        "clickCreatingTool.insertPart" : function(loc) {  // scroll to the new node
              var node = go.ClickCreatingTool.prototype.insertPart.call(this, loc);
              if (node !== null) {
                this.diagram.select(node);
                this.diagram.commandHandler.scrollToPart(node);
                this.diagram.commandHandler.editTextBlock(node.findObject("NAMETB"));
              }
              return node;
            }},
        {
        layout:
          $(go.TreeLayout,
            {
              isOngoing: true,
              treeStyle: go.TreeLayout.StyleLastParents,
              arrangement: go.TreeLayout.ArrangementHorizontal,
              // properties for most of the tree:
              angle: 90,
              layerSpacing: 35,
              // properties for the "last parents":
              alternateAngle: 90,
              alternateLayerSpacing: 35,
              alternateAlignment: go.TreeLayout.AlignmentBus,
              alternateNodeSpacing: 20
            }),
        'undoManager.isEnabled': true
      }
          );



// --------------------------diagram listeners------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
myDiagram.addDiagramListener("Modified", function(e) {
        var button = document.getElementById("SaveButton");
        if (button) button.disabled = !myDiagram.isModified;
        var idx = document.title.indexOf("*");
        if (myDiagram.isModified) {
          if (idx < 0) document.title += "*";
        } else {
          if (idx >= 0) document.title = document.title.substr(0, idx);
        }
      });

      // manage boss info manually when a node or link is deleted from the diagram
      myDiagram.addDiagramListener("SelectionDeleting", function(e) {
        var part = e.subject.first(); // e.subject is the myDiagram.selection collection,
        // so we'll get the first since we know we only have one selection
        myDiagram.startTransaction("clear boss");
        if (part instanceof go.Node) {
          var it = part.findTreeChildrenNodes(); // find all child nodes
          while (it.next()) { // now iterate through them and clear out the boss information
            var child = it.value;
            var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
            if (bossText === null) return;
            bossText.text = "";
          }
        } else if (part instanceof go.Link) {
          var child = part.toNode;
          var bossText = child.findObject("boss"); // since the boss TextBlock is named, we can access it by name
          if (bossText === null) return;
          bossText.text = "";
        }
        myDiagram.commitTransaction("clear boss");
      });

// --------------------------modification couleur par nodes------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
// --------------------------------------------------------------------------------------------------------------------------
          var levelColors = ["#AC193D", "#2672EC", "#8C0095", "#5133AB",
        "#008299", "#D24726", "#008A00", "#094AB2"];

      // override TreeLayout.commitNodes to also modify the background brush based on the tree depth level
      myDiagram.layout.commitNodes = function() {
        go.TreeLayout.prototype.commitNodes.call(myDiagram.layout);  // do the standard behavior
        // then go through all of the vertexes and set their corresponding node's Shape.fill
        // to a brush dependent on the TreeVertex.level value
        myDiagram.layout.network.vertexes.each(function(v) {
          if (v.node) {
            var level = v.level % (levelColors.length);
            var color = levelColors[level];
            var shape = v.node.findObject("SHAPE");
            if (shape) shape.fill = $(go.Brush, "Linear", { 0: color, 1: go.Brush.lightenBy(color, 0.05), start: go.Spot.Left, end: go.Spot.Right });
          }
        });
      };

// -------------------------node template--------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
  myDiagram.nodeTemplate =
        $(go.Node, "Auto",
          { doubleClick: nodeDoubleClick },{click:showEmployeeInfo},
          { // handle dragging a Node onto a Node to (maybe) change the reporting relationship
            mouseDragEnter: function(e, node, prev) {
              var diagram = node.diagram;
              var selnode = diagram.selection.first();
              if (!mayWorkFor(selnode, node)) return;
              var shape = node.findObject("SHAPE");
              if (shape) {
                shape._prevFill = shape.fill;  // remember the original brush
                shape.fill = "darkred";
              }
            },
            mouseDragLeave: function(e, node, next) {
              var shape = node.findObject("SHAPE");
              if (shape && shape._prevFill) {
                shape.fill = shape._prevFill;  // restore the original brush
              }
            },
            mouseDrop: function(e, node) {
              var diagram = node.diagram;
              var selnode = diagram.selection.first();  // assume just one Node in selection
              if (mayWorkFor(selnode, node)) {
                // find any existing link into the selected node
                var link = selnode.findTreeParentLink();
                if (link !== null) {  // reconnect any existing link
                  link.fromNode = node;
                } else {  // else create a new link
                  diagram.toolManager.linkingTool.insertLink(node, node.port, selnode, selnode.port);
                }
              }
            }
          },
          // for sorting, have the Node.text be the data.name
          new go.Binding("text", "name"),
          // bind the Part.layerName to control the Node's layer depending on whether it isSelected
          new go.Binding("layerName", "isSelected", function(sel) { return sel ? "Foreground" : ""; }).ofObject(),
          // define the node's outer shape
          $(go.Shape, "Rectangle",
            {
              name: "SHAPE", fill: "white", stroke: null,
              // set the port properties:
              portId: "", fromLinkable: true, toLinkable: true, cursor: "pointer"
            }),
          $(go.Panel, "Horizontal",
            // $(go.Picture,
            //   {
            //     name: "Picture",
            //     desiredSize: new go.Size(39, 50),
            //     margin: new go.Margin(6, 8, 6, 10),
            //   },
               new go.Binding("source", "ID", findHeadShot)
              // )
              ,
            // define the panel where the text will appear
            $(go.Panel, "Table",
              {
                maxSize: new go.Size(150, 999),
                margin: new go.Margin(6, 10, 0, 3),
                defaultAlignment: go.Spot.Left
              },
              $(go.RowColumnDefinition, { column: 2, width: 4 }),
              $(go.TextBlock, textStyle(),  // the name
                {
                  name: "NAMETB",
                  row: 0, column: 0, columnSpan: 5,
                  font: "12pt Segoe UI,sans-serif",
                  editable: true, isMultiline: false,
                  minSize: new go.Size(10, 16)
                },
                new go.Binding("text", "name").makeTwoWay()),
              // $(go.TextBlock, "Title: ", textStyle(),
              //   { row: 1, column: 0 }),
              // $(go.TextBlock, textStyle(),
              //   {
              //     row: 1, column: 1, columnSpan: 4,
              //     editable: true, isMultiline: false,
              //     minSize: new go.Size(10, 14),
              //     margin: new go.Margin(0, 0, 0, 3)
              //   },
              //   new go.Binding("text", "title").makeTwoWay()),
              $(go.TextBlock, textStyle(),
                { row: 2, column: 0 },
                new go.Binding("text", "title", function(v) { return "Poste: " + v; })),
              $(go.TextBlock, textStyle(),
                { name: "boss", row: 3, column: 0, }, // we include a name so we can access this TextBlock when deleting Nodes/Links
                new go.Binding("text", "parent", function(v) { return "Boss: " + v; })),
              $(go.TextBlock, textStyle(),  // the comments
                {
                  row: 3, column: 0, columnSpan: 5,
                  font: "italic 9pt sans-serif",
                  wrap: go.TextBlock.WrapFit,
                  editable: true,  // by default newlines are allowed
                  minSize: new go.Size(10, 14)
                },
                new go.Binding("text", "comments").makeTwoWay())
            )  // end Table Panel
          ) // end Horizontal Panel
        );  // end Node

// --------------------------------------------------template contextMenu----------------------
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
  // the context menu allows users to make a position vacant,
      // remove a role and reassign the subtree, or remove a department
      myDiagram.nodeTemplate.contextMenu =
        $("ContextMenu",
          $("ContextMenuButton",
            $(go.TextBlock, "Vacate Position"),
            {
              click: function(e, obj) {
                var node = obj.part.adornedPart;
                if (node !== null) {
                  var thisemp = node.data;
                  myDiagram.startTransaction("vacate");
                  // update the key, name, and comments
                  myDiagram.model.setDataProperty(thisemp, "name", "(Vacant)");
                  // myDiagram.model.setDataProperty(thisemp, "comments", "");
                  myDiagram.commitTransaction("vacate");
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "Remove Role"),
            {
              click: function(e, obj) {
                // reparent the subtree to this node's boss, then remove the node
                var node = obj.part.adornedPart;
                if (node !== null) {
                  myDiagram.startTransaction("reparent remove");
                  var chl = node.findTreeChildrenNodes();
                  // iterate through the children and set their parent key to our selected node's parent key
                  while (chl.next()) {
                    var emp = chl.value;
                    myDiagram.model.setParentKeyForNodeData(emp.data, node.findTreeParentNode().data.key);
                  }
                  // and now remove the selected node itself
                  myDiagram.model.removeNodeData(node.data);
                  myDiagram.commitTransaction("reparent remove");
                }
              }
            }
          ),
          $("ContextMenuButton",
            $(go.TextBlock, "Remove Department"),
            {
              click: function(e, obj) {
                // remove the whole subtree, including the node itself
                var node = obj.part.adornedPart;
                if (node !== null) {
                  myDiagram.startTransaction("remove dept");
                  myDiagram.removeParts(node.findTreeParts());
                  myDiagram.commitTransaction("remove dept");
                }
              }
            }
          )
        );
// -----------------------les liens des templates--------------------
myDiagram.linkTemplate =
        $(go.Link, go.Link.Orthogonal,
          { corner: 5, relinkableFrom: true, relinkableTo: true },
          $(go.Shape, { strokeWidth: 4, stroke: "#00a4a4" }));  // the link shape


// ---------DiagramLayout---------------------------------------------
function SideTreeLayout() {
      go.TreeLayout.call(this);
    }
    go.Diagram.inherit(SideTreeLayout, go.TreeLayout);

    SideTreeLayout.prototype.makeNetwork = function(coll) {
      var net = go.TreeLayout.prototype.makeNetwork.call(this, coll);
      // copy the collection of TreeVertexes, because we will modify the network
      var vertexcoll = new go.Set(/*go.TreeVertex*/);
      vertexcoll.addAll(net.vertexes);
      for (var it = vertexcoll.iterator; it.next();) {
        var parent = it.value;
        // count the number of assistants
        var acount = 0;
        var ait = parent.destinationVertexes;
        while (ait.next()) {
          if (isAssistant(ait.value.node)) acount++;
        }
        // if a vertex has some number of children that should be assistants
        if (acount > 0) {
          // remember the assistant edges and the regular child edges
          var asstedges = new go.Set(/*go.TreeEdge*/);
          var childedges = new go.Set(/*go.TreeEdge*/);
          var eit = parent.destinationEdges;
          while (eit.next()) {
            var e = eit.value;
            if (isAssistant(e.toVertex.node)) {
              asstedges.add(e);
            } else {
              childedges.add(e);
            }
          }
          // first remove all edges from PARENT
          eit = asstedges.iterator;
          while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
          eit = childedges.iterator;
          while (eit.next()) { parent.deleteDestinationEdge(eit.value); }
          // if the number of assistants is odd, add a dummy assistant, to make the count even
          if (acount % 2 == 1) {
            var dummy = net.createVertex();
            net.addVertex(dummy);
            net.linkVertexes(parent, dummy, asstedges.first().link);
          }
          // now PARENT should get all of the assistant children
          eit = asstedges.iterator;
          while (eit.next()) {
            parent.addDestinationEdge(eit.value);
          }
          // create substitute vertex to be new parent of all regular children
          var subst = net.createVertex();
          net.addVertex(subst);
          // reparent regular children to the new substitute vertex
          eit = childedges.iterator;
          while (eit.next()) {
            var ce = eit.value;
            ce.fromVertex = subst;
            subst.addDestinationEdge(ce);
          }
          // finally can add substitute vertex as the final odd child,
          // to be positioned at the end of the PARENT's immediate subtree.
          var newedge = net.linkVertexes(parent, subst, null);
        }
      }
      return net;
    };

    SideTreeLayout.prototype.assignTreeVertexValues = function(v) {
      // if a vertex has any assistants, use Bus alignment
      var any = false;
      var children = v.children;
      for (var i = 0; i < children.length; i++) {
        var c = children[i];
        if (isAssistant(c.node)) {
          any = true;
          break;
        }
      }
      if (any) {
        // this is the parent for the assistant(s)
        v.alignment = go.TreeLayout.AlignmentBus;  // this is required
        v.nodeSpacing = 50; // control the distance of the assistants from the parent's main links
      } else if (v.node == null && v.childrenCount > 0) {
        // found the substitute parent for non-assistant children
        //v.alignment = go.TreeLayout.AlignmentCenterChildren;
        //v.breadthLimit = 3000;
        v.layerSpacing = 0;
      }
    };

    SideTreeLayout.prototype.commitLinks = TreeLayoutCommits;

    myOverview =
        $(go.Overview, "myOverviewDiv",  // the HTML DIV element for the Overview
          { observed: myDiagram, contentAlignment: go.Spot.Center });


 // --------------------------les nodes du diagrammes----------------------------------------------------------------------------
myDiagram.model = new go.TreeModel(<?php echo json_encode($Organigram) ?>);
// ------------------------------------------------------------------------


</script>


</html>