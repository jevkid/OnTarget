function r = calculateScore(rings, arrow)

	% Init ring values
	ringValues = [11 10 9 8 7 6 5 4 3 2 1];

	% Init arrow vars
%	x = arrow{1,1};
%	y = arrow{1,2};
%
%	% Loop through each ring and check if the arrow is in each one.
%	for i = 1:length(rings)
%
%		% Init rings vars
%		cx = rings{i,1};
%		cy = rings{i,2};
%		rad = rings{i,3};
%
%		if ((((x - cx)^2)+((y - cy)^2))) < r^2)
%			score = ringValues(i);
%			break;
%		end
%	end	
	r = 10;
end

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