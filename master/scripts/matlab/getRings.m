function r = getRings(img, targetPos)
	cx = targetPos{1,1};
	cy = targetPos{1,2};

	rings = cell(11, 3);

	for i = 1:length(rings)
		rings{i,1} = cx;
		rings{i,2} = cy;
		rings{i,3} = (i*20);
	end

	r = rings;
end

%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
%
% Function: getRings
%
% Called From: doVideoAnalysis, doImageAnalysis.
% Returns: An array of rings and their equations.
% Description: Draws rings around each section of the target so that findArrows can easily find the scores.
%
% PSEUDOCODE:
%
% getRings(img):
% 	targetPos = getTargetPos(img)
% 	rings[11] = targetPos[0};
% 	for i in xrange(0,10)):
% 		rings[i] = # Find position of each ring
% 	return rings