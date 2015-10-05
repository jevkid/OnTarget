function r = calculateScore(center_x,center_y,x,y)
	
center_x = 0; x = 5;

center_y = 0; y = 3;

radius = 2;

dist = sqrt((center_x - x) ** 2 + (center_y - y) ** 2);

"is it within x^2 + y^2 = 16\n"

	if (dist < radius ^ 2)

   	 	"Within x^2 + y^2 = 4"
    	radius = 3;
    
	elseif (dist < radius ^ 2)

    "Within x^2 + y^2 = 9"
     	radius = 4;
    
	elseif (dist < radius ^ 2)

    "Within x^2 + y^2 = 16"
     	radius = 5;
    
	elseif (dist < radius ^ 2)

    	"Within x^2 + y^2 = 25"

	else 
    	"Outside target"

end

r = radius;

return r;

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: calculateScore
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: An integer between 1 and 10 or "M" or "X".
% Description: Takes an arrow and return the ring it lies in.
%
% PSEUDOCODE:
%
% calculateScore(rings, arrow):
% 	for i in xrange(count(rings),0):		# Loop from 10 ring down to 1 ring.. else miss.
% 		if (ring[i].contains(arrow)):			# Contains in a geometrical sense.
% 			return i 												# Returns the value of the first ring that contained the dot.
% 			break